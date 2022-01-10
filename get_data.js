
function sendJsonToPhp() {

  var XMLHttpRequest = require("xmlhttprequest").XMLHttpRequest;

  const data = null;

  const xhr = new XMLHttpRequest();
  
  xhr.addEventListener("readystatechange", function () {
    if (this.readyState === this.DONE) {
      console.log(this.responseText);
      var xhrPost = new XMLHttpRequest();
      xhrPost.open("POST", "http://localhost:8001/post.php", !0);
      xhrPost.setRequestHeader("Content-Type", "application/json");
      xhrPost.send(this.responseText);
      xhrPost.onreadystatechange = function () {
          if (xhrPost.readyState === 4 && xhrPost.status === 200) {
              // in case we reply back from server
              jsondata = JSON.parse(xhrPost.responseText);
              console.log(jsondata);
          }
      }
    }
  });
  
  xhr.open("GET", "https://randomuser.me/api/?results=5&inc=name,gender,dob,nat,phone,email&noinfo");
  
  xhr.send(data);
}

sendJsonToPhp()

