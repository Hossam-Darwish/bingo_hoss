$(function()
{
    var category_id;
    var element_delete;
    $(".category_delete").click(function(){
        category_id = $(this).attr("rel");
        element_delete = $(this).parent().parent();
        });
    
    $(".confirm_delete").click(function(){
        
        var datasend = {"category_id":category_id};
        $.post("ajaxdeletecategory.php",datasend,function(data){
                
                if(data=="yes")
                {
                    element_delete.hide();
                }
                else
                {
                    alert(data);
                }
            
            });
        
        });
    
});