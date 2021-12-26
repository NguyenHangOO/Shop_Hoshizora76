
    <div class="container-fluid">
        <hr>
        <style> #cuoi p{margin-bottom:3px;}  </style>
        <div class="container">
            <div style="font-size:13px;" id="cuoi">
            <?php
			$row= json_decode($data["giaodien"],true);
            foreach ($row as list("footer"=>$footer)){
                echo $footer;
             } ?>
            </div>
            <hr>
            <span id="f1" style=" float:left; margin-top: 1px;">CopyRight &copy; 2021 bởi HangNguyen</span> 
            <a id="f2" href="mailto:lehang.ut@gmail.com?subject=Help box - tell us what you need from us." style=" float:right; margin-top: 1px; margin-right: 5px; ">
            <i class="fas fa-envelope"></i> Hộp thư liên hệ</a>
        </div>
    </div>
</div>
    <div class="zalo-chat-widget" data-oaid="2259331590596537687" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="" data-height=""></div>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
	<script src="public/js/main.js"></script>
</body>
</html>