document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".posts-of-users").forEach((post) => {
        const description = post.querySelector(".post-description");
        const button = post.querySelector(".read-more-btn");

        button.addEventListener("click", function () {
            description.classList.toggle("expanded");

            // Toggle button text
            if (description.classList.contains("expanded")) {
                button.textContent = "Read Less";
            } else {
                button.textContent = "Read More";
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Select all story images
    document.querySelectorAll(".story").forEach((story) => {
        story.addEventListener("click", function () {
            // Get user name and thought from data attributes
            let userName = this.getAttribute("data-user");
            let userThought = this.getAttribute("data-thought");

            // Update modal content
            document.getElementById("thoughtUser").textContent = userName;
            document.getElementById("thoughtText").textContent = userThought;

            // Show Bootstrap modal
            let thoughtModal = new bootstrap.Modal(
                document.getElementById("thoughtModal")
            );
            thoughtModal.show();
        });
    });
});