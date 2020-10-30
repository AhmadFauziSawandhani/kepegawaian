@extends('layouts.app')
@section('content')
<div class="form-group">
    <form method="post" action="{{ route('setting.update', $brand->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="container">
        <div class="row">
            <div class="form-group col-6">
                <label for="name_brand">Nama Aplikasi</label>
                <input id="name_brand" name="name_brand" type="text" class="form-control @error('name_brand') is-invalid @enderror" value="{{ $brand->name_brand }}"  autocomplete="name" onkeyup="this.value = this.value.toUpperCase()" autofocus>
                @error('name_brand')
                    <span class="invalid-feedback" role="alert  ">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="image_login">Gambar Untuk Halaman Login</label><br>
                @php
                    $url = "../public/assets/img/brand/";
                    $login = $url.$setting->image_login; 
                @endphp
                <input id="file_mask" name="file_mask_log" type="file" class="@error('file_mask') is-invalid @enderror"  autocomplete="name" onkeyup="this.value = this.value.toUpperCase()" autofocus>
                @if (file_exists($login))
                    <input id="image_login" name="image_login" type="text" class="form-control" value="{{ $setting->image_login }}"  autocomplete="name" autofocus>
                @else
                    <input id="image_login" name="image_login" type="text" class="form-control" value=""  autocomplete="name" autofocus>
                @endif
            </div>
            <div class="form-group col-6">
                <label for="image_register">Gambar Untuk Halaman Register</label><br>
                @php
                    $url = "../public/assets/img/brand/";
                    $regis = $url.$setting->image_register; 
                @endphp
                <input id="file_mask_regis" name="file_mask_regis" type="file" class=" @error('file_mask_regis') is-invalid @enderror" autocomplete="name" onchange="nk.nk_validate_file(this,{'type':'single-document'})" accept=".jpeg,.png,.jpg" autofocus>
                @if (file_exists($regis))
                    <input id="image_register" name="image_register" type="text" class="form-control" value="{{ $setting->image_register }}"  autocomplete="name" autofocus>
                @else
                    <input id="image_register" name="image_register" type="text" class="form-control" value="" autocomplete="name" autofocus>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary" style="float: right;" value="Upload">Simpan</button>
    </div>
    </form>
</div>
<script>
    function nkAtribute() {
        this.nk_validate_office = (val)=>{
            switch (val) {
            case ".doc" : return "msword";
            break;
            case ".dot" : return "msword";
            break;
            case ".docx" : return "vnd.openxmlformats-officedocument.wordprocessingml.document";
            break;
            case ".dotx" : return "vnd.openxmlformats-officedocument.wordprocessingml.template";
            break;
            case ".docm" : return "vnd.ms-word.document.macroEnabled.12";
            break;
            case ".dotm" : return "vnd.ms-word.template.macroEnabled.12";
            break;
            case ".xls" : return "vnd.ms-excel";
            break;
            case ".xlt" : return "vnd.ms-excel";
            break;
            case ".xla" : return "vnd.ms-excel";
            break;
            case ".xlsx" : return "vnd.openxmlformats-officedocument.spreadsheetml.sheet";
            break;
            case ".xltx" : return "vnd.openxmlformats-officedocument.spreadsheetml.template";
            break;
            case ".xlsm" : return "vnd.ms-excel.sheet.macroEnabled.12";
            break;
            case ".xltm" : return "vnd.ms-excel.template.macroEnabled.12";
            break;
            case ".xlam" : return "vnd.ms-excel.addin.macroEnabled.12";
            break;
            case ".xlsb" : return "vnd.ms-excel.sheet.binary.macroEnabled.12";
            break;
            case ".ppt" : return "vnd.ms-powerpoint";
            break;
            case ".pot" : return "vnd.ms-powerpoint";
            break;
            case ".pps" : return "vnd.ms-powerpoint";
            break;
            case ".ppa" : return "vnd.ms-powerpoint";
            break;
            case ".pptx" : return "vnd.openxmlformats-officedocument.presentationml.presentation";
            break;
            case ".potx" : return "vnd.openxmlformats-officedocument.presentationml.template";
            break;
            case ".ppsx" : return "vnd.openxmlformats-officedocument.presentationml.slideshow";
            break;
            case ".ppam" : return "vnd.ms-powerpoint.addin.macroEnabled.12";
            break;
            case ".pptm" : return "vnd.ms-powerpoint.presentation.macroEnabled.12";
            break;
            case ".potm" : return "vnd.ms-powerpoint.template.macroEnabled.12";
            break;
            case ".ppsm" : return "vnd.ms-powerpoint.slideshow.macroEnabled.12";
            break;
            case ".mdb" : return "vnd.ms-access";
            break; 
            }
        }
        this.nk_validate_file = (oInput,dataArr)=>{
            var validFileExtensions = oInput.getAttribute("accept").split(",");
            if (oInput.type == "file") {
                files = oInput.files;
                if (files.length > 0) {
                    let blnValid = false;
                    officeList = [
                    ".doc",".dot",".docx",".dotx",".docm",".dotm",".xls",".xlt",".xla",".xlsx",".xltx",".xlsm",".xltm",".xlam",".xlsb",".ppt",".pot",".pps",".ppa",".pptx",".potx",".ppsx",".ppam",".pptm",".potm",".ppsm",".mdb"
                    ];
                    for (let i = 0; i < files.length; i++) {
                    for (var j = 0; j < validFileExtensions.length; j++) {
                        if (officeList.includes(validFileExtensions[j])) {
                        ext = files[i].type.split("/");
                        tempExt = nk.nk_validate_office(validFileExtensions[j]);
                        if (ext[ext.length-1] == tempExt) {
                            blnValid = true;
                            break;
                        }
                        }else{
                        ext = files[i].type.split("/");
                        if ("."+ext[ext.length-1] == validFileExtensions[j]) {
                            blnValid = true;
                            break;
                        }
                        }
                    }
                    }
                    if (!blnValid) {
                    oInput.value = "";
                    return false;
                    }else{
                    if ($(oInput).parent().find(".nk-field").length>0) {
                        filename = oInput.files[0]["name"].split(".");
                        filename.pop();
                        filename.join("");
                        $(oInput).parent().find(".nk-field")[0].value= filename;
                    }
                    // you can set your function in here, just store data on dataArr, and use switch in here
                    switch (dataArr.type) {
                        case 'multi-images':
                        for (let i = 0; i < files.length; i++) {
                            var oFReader = new FileReader();
                            oFReader.readAsDataURL(files[i]);
                            oFReader.onload = function (oFREvent) {
                            str = '<div onclick="delete_this(this);$(&quot;#fileMask&quot;).val(&quot;&quot;)" class="nk-delete-this nk-display-flex nk-col-7" style="background-color: rgb(var(--color-silver-lv1));height:250px">'+
                                    '<img style="border:2px solid #fff;box-sizing:border-box" class="nk-object-fit" src="'+oFREvent.target.result+'" alt="">'+
                                    '<input type="hidden" name="imgClinics[]" value="'+oFREvent.target.result+'">'+
                                    '</div>';
                            $("#"+dataArr.parent).html(str+$("#"+dataArr.parent).html());
                            }
                        }
                        oInput.value = "";
                        break;
                        case 'single-image':
                        if ((files[0].size/1024)/1024 > 5) {
                            add_toast("Ukuran file yang diizinkan kurang dari/sama dengan 5 mb","info");
                        }else{
                            if ("direct" in dataArr && dataArr.direct) {
                            form = document.getElementById(dataArr.form);
                            console.log(form);
                            generate_token();
                            ajax_operation({
                                type:"post",
                                url:form.getAttribute("action"),
                                form:dataArr.form,
                                target:dataArr.target,
                            });
                            }else{

                            }
                        }
                        break;
                        case 'single-document':
                        if ((files[0].size/1024)/1024 > 15) {
                            add_toast("Ukuran file yang diizinkan kurang dari/sama dengan 15 mb","info");
                        }
                        break;
                    }

                    }
                }
            }
            return true;
        }
    }
</script>
@endsection