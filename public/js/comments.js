var baseUrl;
$(document).ready(function(){
            $("#comment_form").hide();
            $("#add_comment").bind("click", toogleAddCommentDiv);
            $("#commentsBtn").bind("click", toogleCommentsDiv);
            $("#submit").click(function(){
var email_check = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
        baseUrl = $("#baseUrl").val();
        var uid = $("#uid").val();
        var email = $("#email").val();
        var comment = $("#comment").val();
        var pid = $("#pid").val();
            
        if(uid){
            dataString = 'uid='+ uid + '&email=' + email + '&comment=' + comment+ '&pid=' + pid;
        }else{
            dataString = 'email=' + email + '&comment=' + comment+ '&pid=' + pid;
        }
        if(email=='' || !email_check.test(email))
        {

            alert('Please Give Valid Details');
        }
        else
        {
            $("#loading").show();
            $("#loading").fadeIn(400).html('<i class="icon-refresh">Loading Comment...</i><br />');
            
            $.ajax({
            type: "POST",
            url: baseUrl + "/comment/add",
            data: dataString,

            cache: false,
            success: function(html){
                
            $("#comments").append(html);
            
            $("#loading").hide();
            },
            error: function(){

            }
            });
        }
        
    });
    });

function toogleAddCommentDiv(){
 $("#comment_form").toggle();
 
}

function toogleCommentsDiv(){
 $("#comments").toggle();
 
}

function submitCommentAjax(){
   
    
}

