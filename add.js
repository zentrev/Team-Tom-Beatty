
function Submit()
{
    console.log(22);

    var writeType = document.getElementById("writeType");
    var order = document.getElementById("order");
    var content = document.getElementById("content");

    var insertTypeSelection = document.getElementById("insertType");
    var insertType = insertTypeSelection.options[insertTypeSelection.selectedIndex].value;

    window.open('http://www.example.com/', '_blank');
}
console.log(222);