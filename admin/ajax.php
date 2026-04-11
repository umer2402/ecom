<script>
function getSubCats(catId) {
    var data=new FormData();
    var xhr = new XMLHttpRequest();
    data.append("catId", catId);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('subCategoryId').innerHTML=this.responseText;
        }
    };
    xhr.open("POST", "loadFiles/getSubCats.php", true);
    xhr.send(data);
}

function loadFile(folderName, fileName, area, id) {
    var data=new FormData();
    var xhr = new XMLHttpRequest();
    data.append("id", id);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById(area).innerHTML=this.responseText;
        }
    };
    xhr.open("POST", folderName+"/"+fileName+".php", true);
    xhr.send(data);
}


</script>