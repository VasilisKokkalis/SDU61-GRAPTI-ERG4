function checkConnection() {
  if (navigator.onLine) {
    document.getElementById("status").innerText = "✅ Η συσκευή έχει σύνδεση στο internet!";

    fetch('ping.php')
      .then(response => response.text())
      .then(data => {
        document.getElementById("status").innerText += "\nΟ server απάντησε: " + data;
      })
      .catch(error => {
        document.getElementById("status").innerText += "\n⚠️ Δεν μπόρεσα να συνδεθώ στον server!";
      });

  } else {
    document.getElementById("status").innerText = "❌ Δεν έχεις σύνδεση στο internet!";
  }
}
