async function profileData() {
    const userCoverImage = document.getElementById("coverImage");
    const userImage = document.getElementById("image");
    const userName = document.querySelectorAll(".user-name");
    const userDesignation = document.getElementById("designation");
    const userCity = document.getElementById("city");
    const userCreatedAt = document.getElementById("created_at");
    const country = document.getElementById("country");
    const language = document.getElementById("language");
    const userPhoneNumber = document.getElementById("phone");
    const userEmail = document.getElementById("userEmail");

    try {
        const result = await axios.get('/api/user-profile');
        // console.log("result", result);

        const userData = result.data.data;
        const userProfile = result.data.data.profile;

        // console.log('user_data', userData);
        // console.log('user_profile_data', userProfile);

        if (userData && userProfile !== null) {
            const coverImage = userProfile.cover_image;
            const image = userProfile.image;
            const countryData = userProfile.country;
            const designationData = userProfile.designation;
            const cityData = userProfile.city;
            const createdAtData = userProfile.created_at;
            const languageData = userProfile.language;
            const phoneData = userProfile.phone;
            const email = userData.email;
            const createdAt = new Date(createdAtData);

            const day = createdAt.getDate();
            const month = createdAt.toLocaleString("en-US", { month: "long" });
            const weekday = createdAt.toLocaleString("en-US", { weekday: "long" });
            const year = createdAt.getFullYear();           

            if (userCoverImage && coverImage) {
                userCoverImage.src = `http://127.0.0.1:8000/admin/assets/img/profile/${coverImage}`;
            }
            if (userImage && image) {
                userImage.src = `http://127.0.0.1:8000/admin/assets/img/profile/${image}`;
            }
            if (userName) {
                userName.forEach(element => {
                    element.textContent = userData.title;
                });
            }
            if (userDesignation && designationData) {
                userDesignation.textContent = designationData;
            }
            if (userCity && cityData) {
                userCity.textContent = cityData;
            }
            if (userCreatedAt && createdAtData) {
                userCreatedAt.textContent = `Joined ${day} ${month} ${weekday} ${year}`;
            }
            if (country && countryData) {
                country.textContent = countryData;
            }
            if (language && languageData) {
                language.textContent = languageData;
            }
            if (userPhoneNumber && phoneData) {
                userPhoneNumber.textContent = phoneData;
            }
            if (userEmail && email) {
                userEmail.textContent = email;
            }

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
                    errorToast(data.message); // "Authentication failed"
                } else if (data && data.error) {
                    errorToast(data.error); // "Invalid email or password"
                } else {
                    errorToast("Server error. Please try again later.");
                }
            }
            else if (status === 401) {
                errorToast("Invalid email or password");
            }
            else if (status === 422) {
                errorToast("Validation failed. Please check your input.");
            }
            else if (status === 404) {
                errorToast("API endpoint not found");
            }
            else {
                errorToast(data?.message || data?.error || "Something went wrong");
            }
        }
        else if (error.request) {
            errorToast("Network error. Please check your internet connection.");
        }
        else {
            errorToast(error.message || "An unexpected error occurred");
        }
    }
}

profileData();