  // Function to show the custom modal after a delay
  function showCustomModal() {
    setTimeout(function() {
      var modal = document.getElementById('upSkillModal');
      modal.style.display = 'block';
    }, 15000); // 15000 milliseconds = 15 seconds
  }

  // Close the modal when the close button is clicked
  var modalClose = document.getElementById('modalClose');
  modalClose.addEventListener('click', function() {
    var modal = document.getElementById('upSkillModal');
    modal.style.display = 'none';
  });

  // Call the function when your page loads
  showCustomModal();



