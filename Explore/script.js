document.addEventListener("DOMContentLoaded", () => {
    // Handle "Call Us" button clicks
    const callButtons = document.querySelectorAll(".btn.btn-error");
  
    callButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("Calling the donor center...");
        // You can replace this with actual phone call trigger if needed
      });
    });
  
    // Handle "Explore More" button
    const exploreButton = document.querySelector("button.btn-primary");
    if (exploreButton) {
      exploreButton.addEventListener("click", () => {
        alert("Loading more donation options...");
        // You can add navigation or content load logic here
      });
    }
  });
  