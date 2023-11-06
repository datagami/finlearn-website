  var inactivityTimer; // Initialize a variable to hold the timer

  // Function to show the custom modal
  function showCustomModal() {
    var modal = document.getElementById('upSkillModal');
    modal.style.display = 'block';
  }

  // Function to start the inactivity timer
  function startInactivityTimer() {
    inactivityTimer = setTimeout(function() {
      showCustomModal(); // Show the modal when the timer expires
    }, 10000); // 10000 milliseconds = 10 seconds (adjust this as needed)
  }

  // Function to reset the inactivity timer
  function resetInactivityTimer() {
    clearTimeout(inactivityTimer); // Clear the existing timer
    startInactivityTimer(); // Start a new timer
  }

  // Close the modal when the close button is clicked
  var modalClose = document.getElementById('modalClose');
  modalClose.addEventListener('click', function() {
    var modal = document.getElementById('upSkillModal');
    modal.style.display = 'none';
    resetInactivityTimer(); // Reset the timer when the modal is closed
  });

  // Add an event listener to detect user activity (e.g., mousemove or keypress)
  document.addEventListener('mousemove', resetInactivityTimer);
  document.addEventListener('keypress', resetInactivityTimer);

  // Call the function to start the inactivity timer when your page loads
  startInactivityTimer();
