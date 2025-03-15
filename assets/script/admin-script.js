jQuery(document).ready(function ($) {
  $("#pks_logo_button").click(function (e) {
    console.log("button is clicked");

    var customUploader = wp.media({
      title: "Select this Logo",
      button: {
        text: "Select this Logo",
      },
      multiple: false,
    });

    customUploader.on("select", function () {
      var attachment = customUploader.state().get("selection").first().toJSON();
      $("#pks_login_logo").val(attachment.url);

      $("#image-preview").attr("src", attachment.url);
    });

    // Open the media uploader dialog
    customUploader.open();
  });

  var logoForm = document.getElementById("logo-form");
  // Capture form submission and prevent the default behavior
  logoForm.addEventListener("submit", function (event) {
    event.preventDefault();
    alert("Settings Changes Successfully!");
    this.submit();
  });
});
