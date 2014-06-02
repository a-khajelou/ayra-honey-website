<div class="wikod-container" data-counter='@if(!is_null($obj)) {{$obj->attachedFiles()->count()}} @else 0 @endif'>
    @if(!is_null($obj) && count($obj->attachedFiles)!=0)
    <div class="image" >
        @foreach($obj->attachedFiles as $attachedFile)
        <div id="product-imgs" class="wikod-one-row">
            <a href="/{{$attachedFile->path}}/{{$attachedFile->real_name}}">{{$attachedFile->real_name}}</a>
        </div>
        @endforeach
    </div>
    @else
    <div class="row">
        <span class="form-contorl">فایل های پیوست</span>
    </div>
    @endif
    <div class="image wikod-one-row" style ='width:90%;'>
        <input id="fileInput" class="input-file" name="attached_file_1" type="file">
        <i style="float:left;  font-size:12px; cursor:pointer;" class="icon-plus"></i>
    </div>
    <div class="image wikod-one-row" style ='width:90%;'>
        <input id="fileInput" class="input-file" name="attached_file_2" type="file">
        <i style="float:left;  font-size:12px; cursor:pointer;" class="icon-plus"></i>
    </div>
    <div class="image wikod-one-row" style ='width:90%;'>
        <input id="fileInput" class="input-file" name="attached_file_3" type="file">
        <i style="float:left;  font-size:12px; cursor:pointer;" class="icon-plus"></i>
    </div>
    <div class="image wikod-one-row" style ='width:90%;'>
        <input id="fileInput" class="input-file" name="attached_file_4" type="file">
        <i style="float:left;  font-size:12px; cursor:pointer;" class="icon-plus"></i>
    </div>
</div>