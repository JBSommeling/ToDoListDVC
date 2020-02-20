/*================================
* CONSTANTS
* ================================*/
const DELETE_TASKLIST = document.getElementById('delete_tasklist');

/*================================
* DOM ELEMENTS
* ================================*/
DELETE_TASKLIST.onclick = function() {
    return validation();
};

/*================================
* Functions
* ================================*/

// Function to show message.
function validation(){
    return confirm("Weet u zeker dat u het wilt verwijderen?");
}