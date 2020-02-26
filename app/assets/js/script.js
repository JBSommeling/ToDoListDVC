/*================================
* CONSTANTS
* ================================*/


/*================================
* DOM ELEMENTS
* ================================*/


/*================================
* Functions
* ================================*/

// Function to show message.
function validation(){
    return confirm("Weet u zeker dat u het wilt verwijderen?");
}

/*================================
* AJAX
* ================================*/

$("document").ready(function(){

    // To sort order by status ASC
     $("#sortASC").click(function(e){

        e.preventDefault();
        $.ajax({
            url: '' ,
            data:{name: ''},
            type:'POST',
            success: function(data){
                $("#container").load('app/pages/view/sort_tasklistASC.php');
            },
            error: function (data) {
                alert('error');
            }
        });
    });

    // To sort order by status DESC
    $("#sortDESC").click(function(e){

        e.preventDefault();
        $.ajax({
            url: '' ,
            data:{name: ''},
            type:'POST',
            success: function(data){
                $("#container").load('app/pages/view/sort_tasklistDESC.php');
            },
            error: function (data) {
                alert('error');
            }
        });
    });

    // To filter status by complete
    $("#filterCompl").click(function(e){

        e.preventDefault();
        $.ajax({
            url: '' ,
            data:{name: ''},
            type:'POST',
            success: function(data){
                $("#container").load('app/pages/view/filter_tasklistCOMPL.php');
            },
            error: function (data) {
                alert('error');
            }
        });
    });

    // To filter status by incomplete
    $("#filterInCompl").click(function(e){

        e.preventDefault();
        $.ajax({
            url: '' ,
            data:{name: ''},
            type:'POST',
            success: function(data){
                $("#container").load('app/pages/view/filter_tasklistINCOMPL.php');
            },
            error: function (data) {
                alert('error');
            }
        });
    });

    $("#filterDur").click(function(e){

        e.preventDefault();
        $.ajax({
            url: '' ,
            data:{name: ''},
            type:'POST',
            success: function(data){
                $("#container").load('app/pages/view/filter_tasklistDUR.php');
            },
            error: function (data) {
                alert('error');
            }
        });
    });
});