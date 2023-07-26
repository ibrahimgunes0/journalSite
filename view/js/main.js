function loadAdminPage(page) {
    switch (page) {
        case "view":
            call("settings/view_settings.php", 'div_admin');
            break;
        case "security":
            call("settings/security_settings.php", 'div_admin');
            break;
        case "addMagazine":
            call("magazine/add_magazine_form.php", 'div_admin');
            break;
        case "magazineList":
            call("magazine/magazine_list.php", 'div_admin');
            break;
        case "aboutUs":
            call("pages/about_us.php", 'div_admin');
            break;
        default:
            call("pages/"+page+".php", 'div_admin');
    }
}

function loadMainPage(page) {
    call("pages/"+page+".php", 'div_main');
}


function resimEkle() {
    call("settings/resim_ekle.php", 'no_id')
}

function call(file, place, type = "GET", params = {}) {
    // if (params.onComplate){
    //     params.data['onComplate'] = params.onComplate ? params.onComplate : "";
    // }

    $.ajax({
        url: file,
        type: type,
        data: params.data,
        success: function (data) {
            if (place !== "no_id") {
                $('#' + place).html(data);
            }
            eval(params.onComplate);
        }
    });
}

function deleteArticle(fileName,id) {
    call("magazine/delete_article.php?fileName="+fileName,'no_id');
    var element = document.getElementById(id);
    var parent = element.parentNode;
    parent.removeChild(element);
}

function restoreArticle(articleTitle,fileName) {

    // Tablo öğesini seçin
    var table = document.getElementById("article_table");

    // Yeni satır oluşturun
    var row = table.getElementsByTagName("tbody")[0].insertRow();

    // Sıra hücresini oluşturun ve değeri ayarlayın

    // <tbody> içindeki <tr> öğelerini seçin
    var tbody = table.getElementsByTagName("tbody")[0];
    var rows = tbody.getElementsByTagName("tr");


    // <tr> öğelerinin sayısını alın
    var rowCount = rows.length;
    // Satıra ID atayın
    var trId = "attr_"+rowCount;
    row.setAttribute("id", "attr_"+rowCount);

    var cell1 = row.insertCell();
    cell1.innerHTML = rowCount; // Sıra değeri

    // Başlık hücresini oluşturun ve değeri ayarlayın
    var cell2 = row.insertCell();
    cell2.innerHTML = articleTitle; // Başlık değeri

    // Dosya Adı hücresini oluşturun ve değeri ayarlayın
    var cell3 = row.insertCell();
    fileName = fileName.split("/");
    cell3.innerHTML = fileName[3]; // Dosya Adı değeri

    var cell4 = row.insertCell();
    cell4.innerHTML = "<td><i onclick=\"deleteArticle('"+fileName+"','"+trId+"')\" style=\"font-size: 25px; color: #e33c3c\" class=\"bi bi-trash3\"></i></td>"; // Dosya Adı değeri
}

function showImage(event, params) {

    var imgElement = document.getElementById(params.id + '_dump');
    imgElement.src = event;
    $('#' + params.id + '_dump').show();
    // var fileInput = event.target;
    // var file = fileInput.files[0];
    // var reader = new FileReader();
    //
    // reader.onload = function(e) {
    //     var imgElement = document.getElementById(params.id+'_dump');
    //     var imgSrcElement = document.getElementById(params.id+'_src');
    //     imgElement.src = e.target.result;
    //     imgSrcElement.value = e.target.result;
    //     $('#'+params.id+'_dump').show();
    // };
    //
    // reader.readAsDataURL(file);
}

function saveSettings(place) {
    var file = "settings/save_settings.php";

    var data = $('#' + place).serialize();

    data = data.replaceAll("&", "|");
    data = {
        "data": data,
        "place": place
    }
    call(file, "no_id", "POST", {data: data, onComplate: 'alert("Kaydedildi")'})

}

function saveMagazine(id) {
    // Tablonun referansını alın
    var table = document.getElementById('article_table');

    // tbody içindeki tüm tr elemanlarını seçin
    var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    // Her bir satırı döngüyle dolaşın
    var articles = "";
    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];

        // Her bir hücreyi seçin ve içeriğini alın
        var cells = row.getElementsByTagName('td');
        var sira = cells[0].innerText;
        var baslik = cells[1].innerText;
        var dosyaAdi = cells[2].innerText;

        // Alınan verileri kullanmak için istediğiniz işlemleri yapabilirsiniz
        if (i > 0){
            articles += "&";
        }
        articles += "order_number|"+i+"="+i+1;
        articles += "&title|"+i+"="+baslik;
        articles += "&file_path|"+i+"="+dosyaAdi;
    }
    var header = $('#header').val();
    var content = magazineContent.getData();
    var cover_photo = $('#cover_photo_dump').attr('src').split("/")[3];
    var data = {
        "header": header,
        "content": content,
        "cover_photo": cover_photo,
        "issn": $('#issn').val(),
    }
    call("magazine/add_magazine.php?"+articles, "no_id", "POST", {data: data, onComplate: "$('#magazineList').click()"})

}

function deleteMagazine(id, cover_photo) {
    if (window.confirm("Dergi silinsin mi")) {
        var data = {
            "id": id,
            "cover_photo": cover_photo
        }
        call("magazine/delete_magazine.php", "no_id", "POST", {data: data, onComplate: "$('#magazineList').click()"})
    }
}

function updateMagazine(id,process) {
    if (process === "save"){

        // Tablonun referansını alın
        var table = document.getElementById('article_table');

        // tbody içindeki tüm tr elemanlarını seçin
        var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

        // Her bir satırı döngüyle dolaşın
        var articles = "";
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];

            // Her bir hücreyi seçin ve içeriğini alın
            var cells = row.getElementsByTagName('td');
            var sira = cells[0].innerText;
            var baslik = cells[1].innerText;
            var dosyaAdi = cells[2].innerText;

            // Alınan verileri kullanmak için istediğiniz işlemleri yapabilirsiniz
            if (i > 0){
                articles += "&";
            }
            articles += "order_number|"+i+"="+(i+1);
            articles += "&title|"+i+"="+baslik;
            articles += "&file_path|"+i+"="+dosyaAdi;
        }

        var header = $('#header').val();
        var content = magazineContent.getData();
        var cover_photo = $('#cover_photo_dump').attr('src').split("/")[3];
        var data = {
            "id": id,
            "header": header,
            "content": content,
            "cover_photo": cover_photo,
            "issn": $('#issn').val(),
        }
        call("magazine/magazine_update.php?"+articles, "no_id", "POST", {data: data,onComplate: "updateMagazine("+id+")"})
    }else {
        var data = {
            "id": id
        }
        call("magazine/magazine_update_form.php", "div_admin", "POST", {data: data})
    }
}

function savePage(page_name, process,page_id) {
    var page_header = $('#header').val();
    var page_menu_name = $('#page_menu_name').val();
    var page_show = $('#page_show').val();
    var page_content = magazineContent.getData();
    var data = {
        "page_name" : page_name,
        "page_header": page_header,
        "page_content": page_content,
        "page_menu_name": page_menu_name,
        "page_show": page_show
    }
    if (process === "save"){
        call("pages/save_page.php", "no_id", "POST",{data:data,onComplate: "alert('Kaydedildi')"})
    }else {
        data["page_id"] = page_id;
        call("pages/update_page.php", "no_id", "POST",{data:data,onComplate: "alert('Güncellendi')"})
    }
}

function loadMagazine(id){
    call("magazine/laod_magazine.php?id="+id, "div_main")
}