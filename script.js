function smoothScroll(id) {
    const el = document.getElementById(id.substring(1));
    if (el) {
      el.scrollIntoView({
        behavior: 'smooth'
      });
    }
  }

  // Get all elements with the class 'popup-trigger'
  var triggers = document.getElementsByClassName('popup-trigger');

  // Loop through the NodeList and bind a click event listener to each
  for (var i = 0; i < triggers.length; i++) {
    triggers[i].addEventListener('click', function () {
      var popupId = this.dataset.popupId;
      var popupElement = document.getElementById(popupId);
      popupElement.style.display = 'block';
    });
  }

  // Close the popup when clicking on the close button
  document.addEventListener('click', function (event) {
    if (event.target.matches('.popup-close')) {
      var popup = event.target.closest('.popup-container');
      popup.style.display = 'none';
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    var closeButtonPopup5 = document.getElementById('closeButtonPopup5');
    closeButtonPopup5.addEventListener('click', function () {
      document.getElementById('popup5').style.display = 'none';
    });
    var closeButtonPopup4 = document.getElementById('closeButtonPopup4');
    closeButtonPopup4.addEventListener('click', function () {
      document.getElementById('popup4').style.display = 'none';
    });
    var closeButtonPopup3 = document.getElementById('closeButtonPopup3');
    closeButtonPopup3.addEventListener('click', function () {
      document.getElementById('popup3').style.display = 'none';
    });
    // Select the specific close button for popup2 using its ID
    var closeButtonPopup2 = document.getElementById('closeButtonPopup2');
    closeButtonPopup2.addEventListener('click', function () {
      document.getElementById('popup2').style.display = 'none';
    });

    // Select the specific close button for popup1 using its ID
    var closeButtonPopup1 = document.getElementById('closeButtonPopup1');
    closeButtonPopup1.addEventListener('click', function () {
      document.getElementById('popup1').style.display = 'none';
    });
  });

  function downloadCV() {
    var link = document.createElement('a');
    link.href = 'SE_DPAJARUNODYA.pdf';
    link.download = 'SE_DPAJARUNODYA.pdf';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }