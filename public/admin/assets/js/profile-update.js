// FETCH USER DATA SCRIPT
async function profileData() {
    const userImage = document.getElementById("image");
    const userCoverImagePrivew = document.getElementById("coverImage");
    const fullName = document.getElementById("fullName");
    const email = document.getElementById("email");
    const phoneNumber = document.getElementById("phone");
    const organization = document.getElementById("organization");
    const designation = document.getElementById("designation");
    const address = document.getElementById("address");
    const state = document.getElementById("state");
    const city = document.getElementById("city");
    const district = document.getElementById("district");
    const zipCode = document.getElementById("zipCode");
    const country = document.getElementById("country");
    const language = document.getElementById("language");
    const facebook = document.getElementById("facebook");
    const instagram = document.getElementById("instagram");
    const linkedin = document.getElementById("linkedin");
    const github = document.getElementById("github");
    const twitter = document.getElementById("twitter");
    const description = document.getElementById("description");
    const profileCv = document.getElementById("userCVPreview");


    try {
        const result = await axios.get('/api/user-profile');
        // console.log("result", result);
        const userData = result.data.data;
        if (userData) {
            // full name 
            if (userData.title && fullName) {
                fullName.value = userData.title || 'N/A';
            }
            // email
            if (userData.email && email) {
                email.value = userData.email || 'N/A';
            }
            // phone number
            if (userData.phone && phoneNumber) {
                phoneNumber.value = userData.phone || 'N/A';
            }
        }
        // Populate profile information
        const userProfile = result.data.data.profile;
        if (userProfile) {
            // Get images
            const image = userProfile.image;
            const coverImage = userProfile.cover_image;
            console.log(userProfile);
            if (userImage && image) {
                userImage.src = `http://127.0.0.1:8000/admin/assets/img/profile/${image}`;
            }
            if (userCoverImagePrivew && coverImage) {
                userCoverImagePrivew.src = `http://127.0.0.1:8000/admin/assets/img/profile/${coverImage}`;
            }
            if (userProfile.designation && designation) {
                designation.value = userProfile.designation || 'N/A';
            }
            if (userProfile.organization && organization) {
                organization.value = userProfile.organization || 'N/A';
            }
            if (userProfile.address && address) {
                address.value = userProfile.address || 'N/A';
            }
            if (userProfile.state && state) {
                state.value = userProfile.state || 'N/A';
            }
            if (userProfile.district && district) {
                district.value = userProfile.district || 'N/A';
            }
            if (userProfile.city && city) {
                city.value = userProfile.city || 'N/A';
            }
            if (userProfile.zip && zipCode) {
                zipCode.value = userProfile.zip || 'N/A';
            }
            if (userProfile.country && country) {
                country.value = userProfile.country || 'N/A';
            }
            if (userProfile.language && language) {
                language.value = userProfile.language || 'N/A';
            }
            if (userProfile.description && description) {
                description.value = userProfile.description || 'N/A';
            }
            // Social media links
            if (userProfile.facebook && facebook) {
                facebook.value = userProfile.facebook || 'N/A';
            }
            if (userProfile.instagram && instagram) {
                instagram.value = userProfile.instagram || 'N/A';
            }
            if (userProfile.linkedin && linkedin) {
                linkedin.value = userProfile.linkedin || 'N/A';
            }
            if (userProfile.github && github) {
                github.value = userProfile.github || 'N/A';
            }
            if (userProfile.twitter && twitter) {
                twitter.value = userProfile.twitter || 'N/A';
            }
            const cv = userProfile.cv;
            if (profileCv && cv) {
                profileCv.src = `http://127.0.0.1:8000/admin/assets/img/profile/${cv}`;
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


//USER UPDATE SCRIPT
async function updateUserData() {
    // Get form data
    const formData = new FormData();

    // Get all input values
    const profileImageInput = document.getElementById("imageUpload").files[0];
    const coverImageInput = document.getElementById("coverImageUpdate").files[0];
    const fullNameInput = document.getElementById("fullName").value;
    const designationInput = document.getElementById("designation").value;
    const organizationInput = document.getElementById("organization").value;
    const phoneNumber = document.getElementById("phone").value;
    const addressInput = document.getElementById("address").value;
    const stateInput = document.getElementById("state").value;
    const cityInput = document.getElementById("city").value;
    const districtInput = document.getElementById("district").value;
    const zipCodeInput = document.getElementById("zipCode").value;
    const countryInput = document.getElementById("country").value;
    const languageInput = document.getElementById("language").value;
    const facebookInput = document.getElementById("facebook").value;
    const instagramInput = document.getElementById("instagram").value;
    const linkedinInput = document.getElementById("linkedin").value;
    const githubInput = document.getElementById("github").value;
    const twitterInput = document.getElementById("twitter").value;
    const descriptionInput = document.getElementById("description").value;

    // Get file inputs
    // console.log(profileImageInput);
    const profileCvInput = document.getElementById("userCVInput").files[0];

    // Append all data to FormData
    if (profileImageInput) {
        formData.append('image', profileImageInput);
    }
    if (coverImageInput) {
        formData.append('cover_image', coverImageInput);
    }
    formData.append('title', fullNameInput);
    formData.append('organization', organizationInput);
    formData.append('designation', designationInput);
    formData.append('phone', phoneNumber);
    formData.append('address', addressInput);
    formData.append('state', stateInput);
    formData.append('city', cityInput);
    formData.append('district', districtInput);
    formData.append('zip', zipCodeInput);
    formData.append('country', countryInput);
    formData.append('language', languageInput);
    formData.append('facebook', facebookInput);
    formData.append('instagram', instagramInput);
    formData.append('linkedin', linkedinInput);
    formData.append('github', githubInput);
    formData.append('twitter', twitterInput);
    formData.append('description', descriptionInput);
    if (profileCvInput) {
        formData.append('cv', profileCvInput);
    }
    try {
        showLoader();
        // Send update request
        const response = await axios({
            method: 'post', // or 'put'
            url: '/api/user-profile/update',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });
        hideLoader();
        // Handle success
        if (response.data.status === 'success' || response.status === 200) {
            successToast(response.data.message);
            setTimeout(function () {
                window.location.reload();
            }, 500);
        } else {
            showAlert('error', response.data.message || 'Failed to update profile');
        }

    } catch (error) {
        hideLoader();
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

// Preview image when file is selected
document.addEventListener('DOMContentLoaded', function () {
    // Profile image preview
    const profileImageInput = document.getElementById('imageUpload');
    if (profileImageInput) {
        profileImageInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    const avatar = document.getElementById('image');
                    if (avatar) {
                        avatar.src = event.target.result;
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }
});
//preview cover image
document.addEventListener('DOMContentLoaded', function () {
    const removeLogoPriview = document.querySelector('.companyLogoReset');
    const companyLogoPreviewInput = document.getElementById('coverImageUpdate');
    const avatar = document.getElementById('coverImage');
    if (companyLogoPreviewInput) {
        companyLogoPreviewInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    if (avatar) {
                        avatar.src = event.target.result;
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }
    if (removeLogoPriview) {
        removeLogoPriview.addEventListener('click', function () {
            avatar.src = 'http://127.0.0.1:8000/admin/assets/img/avatars/1.png';
            companyLogoPreviewInput.value = '';
        });
    }
});
document.addEventListener("DOMContentLoaded", function () {
    const cvInput = document.getElementById("userCVInput");
    const cvPreview = document.getElementById("userCVPreview");
    const resetBtn = document.querySelector(".userCVReset");
    if (cvInput) {
        cvInput.addEventListener("change", function (e) {
            const file = e.target.files[0];
            if (!file) return;
            if (file.type !== "application/pdf") {
                alert("Please upload a PDF file only.");
                cvInput.value = "";
                cvPreview.src = "";
                return;
            }
            const pdfURL = URL.createObjectURL(file);
            cvPreview.src = pdfURL;
        });
    }
    if (resetBtn) {
        resetBtn.addEventListener("click", function () {
            cvInput.value = "";
            cvPreview.src = "";
        });
    }

});


// // Reset image functionality
document.querySelector('.profile-reset')?.addEventListener('click', function () {
    const avatar = document.getElementById('profileImage');
    if (avatar) {
        avatar.src = "http://127.0.0.1:8000/admin/assets/img/avatars/1.png";
    }
    const fileInput = document.getElementById('profileProfileImage');
    if (fileInput) {
        fileInput.value = '';
    }
});