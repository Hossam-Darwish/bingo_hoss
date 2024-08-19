$(function()
{
    var category_id;
    var category_name;
    
      $(".btnedit").click(function()
    {
        category_edit = $(this).parent().parent();  
    });
    
     
  $('.edit_category').click(function() {
        // Getting the category ID and the new category name from the form input
         category_id = $(this).attr('rel');
         
         category_name = $(this).closest('.modal-content').find('#itemName').val();
         
         var datasend = {"category_id" : category_id, "category_name" : category_name};
         
                 $.post("ajax_edit_category.php",datasend,function(output)
        {
            if(output=="yes")
            {
                
    var row = $('tr').filter(function() {
        return $(this).find('td:first').text() == category_id;
    });

    
    row.find('td:nth-child(2)').text(category_name);
    
    alert("Category updated successfully!");
                
            }
            else
            {
                alert("Error! SQL Error");
            }
            
        });

});
  
  });
  