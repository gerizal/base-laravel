'use-strict';
// initialize name var
var imgName = null;
// create asynchronus initialization
window.fbAsyncInit = function () {
  FB.init({
    appId: '457082754686719',
    autoLogAppEvents: true,
    xfbml: false,
    cookie: true,
    version: 'v2.11'
  });

  // get image name from dom element
  setName();

  // share on twitter
  $('#twitter').on('click', function (e) {
    e.preventDefault();
    shareImage('tw');
  });

  // share on facebook
  $('#facebook').on('click', function (e) {
    e.preventDefault();
    shareImage('fb');
  });

};

// request fb sdk
(function (d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) { return; }
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// share image to socmeds
function shareImage(social) {
  let image;
  let display;
  if (social === 'fb') {
    // image = getPath() + '/uploads/canvas/' + imgName;
    image = getPath() + '/template/share-gallery/' + imgName + '/facebook';
    FB.ui({
      method: 'share',
      mobile_iframe: false,
      href: image,
      quote: "Decode my secret message I just created with #SquadCast!\n\nCreate your own now!",
      hashtag: '#SquadCast',
      display: 'popup'
    }, function (response) {
      console.log(response)
    });
  } else {
    image = getPath() + '/template/share-gallery/' + imgName + '/twitter';
    var twitterWindow = window.open('https://twitter.com/share?url=' + encodeURI(image), ',twitter-popup', 'height=350,width=600');
    if (twitterWindow.focus) { twitterWindow.focus(); }
  }
}

// get var name and set it to var imgName
function setName() {
  imgName = $('#to-socmed').attr('data-image') || '';
}

// get fullpath of domain
function getPath() {
  return window.location.protocol + '//' + window.location.hostname;
}