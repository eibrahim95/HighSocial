$(document).ready(function() {
    $.ajaxSetup({ cache: true }); // since I am using jquery as well in my app
     $("#tw-login").click(function(){
            w = window.open(window.location.host+"/twitter/login/", "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
            w.stop();
            w.open(window.location.host+"/twitter/login/", "_self")
        });
        
});

// function to send uid and access_token back to server
// actual permissions granted by user are also included just as an addition
function processLoginClick (response) {    
    var uid = response.authResponse.userID;
    var access_token = response.authResponse.accessToken;
    var permissions = response.authResponse.grantedScopes;
    var data = { uid:uid, 
                 access_token:access_token, 
                 _token:$('meta[name="_token"]').attr('content'), // this is important for Laravel to receive the data
                 permissions:permissions 
               };        
    postData(window.location.href, data, "post");
}

// function to post any data to server
function postData(url, data, method) 
{
    method = method || "post";
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", url);
    for(var key in data) {
        if(data.hasOwnProperty(key)) 
        {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", data[key]);
            form.appendChild(hiddenField);
         }
    }
    document.body.appendChild(form);
    form.submit();
}