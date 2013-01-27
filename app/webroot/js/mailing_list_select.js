// some default js functions
function selectAll(selectBoxID, selectAll) {
    // have we been passed an ID
    selectBox = document.getElementById(selectBoxID);

    // is the select box a multiple select box?
    if (selectBox.type == "select-multiple") {
        for (var i = 0; i < selectBox.options.length; i++) {
            selectBox.options[i].selected = selectAll;
        }
    }
}