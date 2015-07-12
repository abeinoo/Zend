/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var baseUrl;
var originalController;
var id;
$(document).ready(function()
{
	baseUrl = $("#baseUrl").val();
	originalController = $("#originalController").val();
	
	$("i[class='icon-remove']").css('cursor', 'pointer');
       
        $("#delete_div").hide();
        
        $("i[class='icon-remove']").bind("click", showAlert);
	$('#delete_action').click(function()
	{
		
        $("#delete_div").hide();
        deleteItem();
        
	});
	$('#keep_action').click(function()
	{
		$("#delete_div").hide();
	});

});
function showAlert(){
    $("#delete_div").show();
    var idArr = $(this).attr('id').split("_");
     id = idArr[1];
}

function deleteItem()
{
   		$.ajax(
		{
			type : "GET",
			url  : baseUrl + "/" + originalController + "/delete/id/"+id,
			dataType: "json",
			success : function()
			{
						window.location = baseUrl + "/" + originalController + "/list/msg/3";
					  },
			error : function()
			{
                
			}
		});
	}	



