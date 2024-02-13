// Function to allow dropping items
function allowDrop(event) {
    event.preventDefault();
  }
  
  // Function to handle dropping items
  function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("text");
    event.target.appendChild(document.getElementById(data));
  }
  
  // Add drag start event listener to draggable elements
  $(document).ready(function() {
    $(".draggable").on("dragstart", function(event) {
      event.originalEvent.dataTransfer.setData("text", event.target.id);
    });
  });
  