async function header() {
    const userFullName = document.getElementById("userFullName");
    const userEmail = document.getElementById("userEmail");
    const userImage = document.querySelectorAll(".image");

    try {
        const result = await axios.get('/api/user-profile');
        // The user data is in result.data.data based on your response
        const userData = result.data.data;
        const userProfile = result.data.data.profile;
        if (userData && userProfile !== null) {
            const image = userProfile.image;
            if (userImage && image) {
                    userImage.forEach(element => {
                        element.src = `http://127.0.0.1:8000/admin/assets/img/profile/${image}`;
                    });
            }
        }
        // Set the values from the API response
        if (userFullName && userData) {
            userFullName.textContent = userData.title;
        }
        if (userEmail && userData) {
            userEmail.textContent = userData.email;
        }
    } catch (error) {
        // console.log("Full error object:", error);
        if (error.response) {
            const status = error.response.status;
            const data = error.response.data;
            // console.log("Status:", status);
            // console.log("Response data:", data);

            if (status === 500) {
                if (data && data.message) {
                    errorToast(data.message);
                    window.location.href = '/login';
                } else if (data && data.error) {
                    errorToast(data.error);
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 2000);
                } else {
                    errorToast("Server error. Please try again later.");
                }
            }
            else if (status === 401) {
                errorToast("Invalid email or password");
                setTimeout(() => {
                    window.location.href = '/login';
                }, 2000);
            }
            else if (status === 404) {
                errorToast("API endpoint not found");
                setTimeout(() => {
                    window.location.href = '/login';
                }, 2000);
            }
            else {
                errorToast(data?.message || data?.error || "Something went wrong");
                setTimeout(() => {
                    window.location.href = '/login';
                }, 2000);
            }
        }
        else if (error.request) {
            errorToast("Network error. Please check your internet connection.");
            setTimeout(() => {
                window.location.href = '/login';
            }, 2000);
        }
        else {
            errorToast(error.message || "An unexpected error occurred");
            setTimeout(() => {
                window.location.href = '/login';
            }, 2000);
        }
    }
}

header();