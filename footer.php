<script src="../Style/toastr/toastr.js"></script>
<div id="pjax-container">
    <script>
        $(function () {
            $("img[src$=jpg],img[src$=gif],img[src$=JPG],img[src$=png],img[src$=jpeg]").addClass("spotlight").each(function () {
                this.onclick = function () {
                    return hs.expand(this)
                }
            });

        })

    </script>
    <style>
        .icon {
            width: 1.5em;
            height: 1.5em;
            vertical-align: -0.3em;
            fill: currentColor;
            overflow: hidden;
        }

        li.cike {
            border-bottom: 1px solid #ddd;
        }

        li {
            list-style-type: none;
        }

        .cike:hover {
            cursor: pointer;
            cursor: url(../Style/cur/hover.cur), pointer;
        }
        button:disabled {
            background: #888;
            opacity: 0.6;
        }
        .avatar{
            width: 2.5em;
            height: 2.5em;
            border-radius: 50%;
            box-shadow: 0 2px 8px #a9a9a98c;
            border: 2px solid #fff;
            margin-right: 0.8rem;
        }
    </style>
</div>
<div class="footer-warp">
    <div class="footer">
        <p><a href="https://beian.miit.gov.cn/#/Integrated/index" target="_blank"><?php echo $icp ?></a></p>
        <p><?php echo $copy ?></p>
    </div>
</div>
<script>
        $(function () {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "rtl": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

    })
    
</script>
<?php echo htmlspecialchars_decode($diy['footerCon'],ENT_QUOTES) ?>