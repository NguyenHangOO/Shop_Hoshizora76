<link rel="stylesheet" type="text/css" href="public/css/star.css">
<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
<div class="container">
    <div class="row sp">
        <span id="spsc">Đánh giá sản phẩm</span>
        <?php 
            $row= json_decode($data["donhangct"],true);
            foreach ($row as list("tensp"=>$tensp,"hinhanh"=>$hinhanh,"sanpham_id"=>$spid,"thanhtien"=>$thanhtien,"donhang_id"=>$iddh)){
                if($spid==$data["idcsp"]){
                ?>
              <div class="col-12" style="position: unset;">
                <hr>
                <div class="row">
                    <div class="col-1"style="position: unset;">
                        <img src="<?php echo $hinhanh ?>" alt="" class="img">
                    </div>
                    <div class="col-7"style="position: unset;">
                        <span><?php echo $tensp ?></span><br/>
                    </div>
                    <div class="col-4"style="position: unset;font-size:11px;margin-left:-15px;">
                        <div class="stars">
                            <form action="./Order/DanhGia/<?php echo $iddh;?>/<?php echo $data["idcsp"];?>" method="post">
                                <input type="hidden" name="idSP" value="<?php echo $spid; ?>">
                                <input class="star star-5" id="star-5" type="radio" name="star5"/>
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star4"/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star3"/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star2"/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" type="radio" name="star1"/>
                                <label class="star star-1" for="star-1"></label>
                                <textarea name="binhluan" id="" cols="50" rows="3"></textarea>
                                <label for="binhluan">Nhận xét</label><br/>
                                <button style="font-size:13px;" type="sumbit" class="btn btn-warning" name="btndanhgia" >Đánh giá</button>
                            </form>
                        </div>
                    </div>
                </div>      
        <?php  } } ?>
    </div>
</div>