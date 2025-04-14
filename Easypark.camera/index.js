document.addEventListener('deviceready', function () {
  console.log('Η εφαρμογή είναι έτοιμη!');
}, false);

function takePicture() {
  navigator.camera.getPicture(onSuccess, onFail, {
    quality: 90,
    destinationType: Camera.DestinationType.DATA_URL,
    encodingType: Camera.EncodingType.JPEG,
    mediaType: Camera.MediaType.PICTURE,
    targetWidth: 900,
    targetHeight: 700,
    saveToPhotoAlbum: false,
    correctOrientation: true
  });

  function onSuccess(imageData) {
    const image = document.getElementById('preview');
    image.src = "data:image/jpeg;base64," + imageData;
  }

  function onFail(message) {
    alert('Αποτυχία λήψης φωτογραφίας: ' + message);
  }
}
