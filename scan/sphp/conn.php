<style media="print">
    .noPrint {
        display: none;
    }

    .yesPrint {
        display: block !important;
    }
</style>
<style type="text/css">
    @import url(fonts/thsarabunnew.css);
    * {
        margin: 0;
        padding: 0;
    }
    h1, h2, h3, h4, h5 {
        line-height: 2em;
        clear: both;
    }
    h2 {
        background: #0F7AC2;
        padding: 0 10px;
        color: #FFF;
        margin: 20px 0 10px;
    }
    p {
        padding: 0 0 10px 0;
    }
    .n {
        font-weight: normal;
        font-style: normal;
    }

    .b {
        font-weight: bold;
        font-style: normal;
    }
    .i {
        font-weight: normal;
        font-style: italic;
    }
    .bi {
        font-weight: bold;
        font-style: italic;
    }      
    code {
        background: #FFF;
    }
    #container {
        width: 900px;
        margin: 20px auto 0;
        border: 1px solid #333;
        padding: 20px;
        background: #FFF;
    }
    #instruction {
        padding: 10px 10px 0;
        background: #e6e6e6;
    }
    #footer {
        width: 940px;
        margin: 0 auto;
        padding: 10px 0 20px;
    }
    .right {
        text-align: right;
    }
    .type {
        font-family: 'THSarabunNew', sans-serif;
        height: 5em;
        width: 98%;
        font-size: 1em;
        clear: both;
        margin: 20px auto 10px;
        padding: 5px 1%;
    }
    @media print {
        a[href]:after {
            content: none !important;
        }
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="../src/jquery.table2excel.js"></script>
<script>
    function printt() {
        $(function () {
            $(".table2excel").table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "myFileName",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true

            });
        });
    }
</script>

<STYLE TYPE="text/css">
    p.breakhere {
        page-break-before: always
    }
</STYLE>


<?php
include('connect.php');
?>
