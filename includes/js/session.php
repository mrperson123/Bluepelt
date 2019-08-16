<?php 
$playercount         = "1";

if(isset($_GET["playercount"])){         $playercount         = $_GET["playercount"];}
?>

var count = <?php echo $playercount; ?> 
$("#add_player").click(function(){
    var userFields = $("tr.player:first").clone(true, true);
    $(userFields).appendTo("table#players");
    $("#players .player:last .player_name").prop('selectedIndex',0);
    $("#players .player:last .session-character").empty();
    $("#players .player:last .session-played input").attr('checked', false);
    $("#players .player:last .session-payed input").attr('checked', false);
    $("#players").children(".player:last").each(function() {
        $(this).find(":input").each(function(){
        if($(this).is("select")){
            $(this).prop('selectedIndex',0);
        }
        if($(this).is("input:text")){
            $(this).val('');
        }
        if($(this).is("input:checkbox")){
            $(this).attr('checked', !this.checked);
        }
        if($(this).is("input:hidden")){
            $(this).val('');
        }
        });
    });
    $('tr.player').each(function(rowIndex){
      /// find each input with a name attribute inside each row
      $(this).find('[name]').each(function(){
        var name;
        
        name = $(this).attr('name');
        name = name.replace(/\[[0-9]+\]/g, '['+rowIndex+']');
        $(this).attr('name',name);
      });
    });
    count++;
});

$(".remove_player").click(function(){
    $(this).closest(".player").remove();
})


    
$('.player_name').change(function() { 

    var $select = $(this).parent().find("select"); // it's <select> element
    var value = $select.val(); 
    var id = {id: $(this).val()};
        
    function getCharacter(id, something, callback){
        $.ajax({ 
            type: "POST",
            url: "xf.getplayer.php",
            data: id, 
            success: function(result){ 
                
                
                callback(result);
                $(something).html(result);
            }
        });    
    }
    
    
    getCharacter(id, $(this).parent().parent().children(".session-character"), function(callback){ 
        window.answer = callback;
    }); 
    
});




