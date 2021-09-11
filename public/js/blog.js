

function loadBlogContent() {
	route = 'blogPosts';
	var xhr = new XMLHttpRequest();
	xhr.open('GET', route, true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  authToken = getCookie('PHPSESSID');

  xhr.setRequestHeader('Authorization', 'Bearer ' + authToken);
	xhr.onload = function () {
	    // do something to response
      var responseText = this.responseText;
      var responseJsonArr = JSON.parse(responseText);
      var i;
      for(i=0; i<responseJsonArr.length; i++) {
        postHtml = responseJsonArr[i]['post_html']
        renderPost(postHtml);
      }
	};
	xhr.send();
}

function renderPost(postHtml, index) {
  blogBodyElement = document.getElementById('blog-body-content');
  blogBodyElement.innerHTML = blogBodyElement.innerHTML + '<hr>' + postHtml;
}

function getCookie(cookieName) {
  var name = cookieName + "=";
  var cookieArray = decodeURIComponent(document.cookie).split(';');

  for(var index = 0; index < cookieArray.length; index++) {
    var cookie = cookieArray[index];
    while (cookie.charAt(0) == ' ') {
      cookie = cookie.substring(1);
    }
    if (cookie.indexOf(name) == 0) {
      return cookie.substring(name.length, cookie.length);
    }
  }

  return "";
}

loadBlogContent()
