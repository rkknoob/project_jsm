@extends('layouts.template.frontend')

<style type="text/css">
    #ju-container .ju-page-title {
        margin-top: 179px;
    }





</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> JUNG SAEM MOOL </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

@section('content')
    <div id="ju-container">
        <div id="ju-content" class="container">
            <div class="ju-page-title">
                <h1 class="entry-title text-gotham text-center">Brand JSM</h1>
                <div class="text-center text-gotham">Brand JUNGSAEMMOOL
</div>
            </div>
            <ul class="nav nav-tabs">
                <li><a href="/brand" class="letters">Concept</a></li>
                <li class="active"><a href="/brand/film" class="letters">Film</a></li>
                <li><a href="/brand/magazines" class="letters">Magazine</a></li>
            </ul>
            <div id="bbsData">
                <div class="page-body">
                    <div class="bbs-table-list tabs-wrap">
                        <table summary="제목, 작성일, 조회수, 동영상">
                            <caption class="displaynone">คลังภาพ</caption>
                            <colgroup>
                                <col width="*" />
                                <col width="110" />
                                <col width="60" />
                            </colgroup>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="video-list">
                            <table summary="제목, 작성일, 조회수, 동영상">
                                <colgroup>
                                    <col width="285px" />
                                    <col width="285px" />
                                    <col width="285px" />
                                    <col width="285px" />
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="box">
                                            <a href="/Detail/Artis"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip]
                                                        แก้ปัญหารูขุมขนและลดหน้ามันแม้ในอากาศที่ร้อน</h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/562_314_you_tube_02_2.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="box">
                                            <a href="#"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip] การแต่งหน้าสำหรับริมฝีปากสองเฉด
                                                    </h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/562_314_you_tube_01_3.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="box">
                                            <a href="#"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip] การแต่งหน้า 'สีแดง' ของคุณ</h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/02_6.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="box">
                                            <a href="#"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip]
                                                        วิธีสร้างกิจวัตรการดูแลผิวที่สมบูรณ์แบบ</h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/01_7.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="box">
                                            <a href="#"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip] วิธีการทำผม</h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/02_5.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="box">
                                            <a href="#"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip] Rozy Makeup</h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/562_314_you_tube_6.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="box">
                                            <a href="#"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip] การแต่งหน้าง่ายๆ สำหรับผู้ชาย</h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/01_6.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="box">
                                            <a href="#"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip] การแต่งหน้าในฤดูหนาว</h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/562_314_you_tube_3.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="box">
                                            <a href="#"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip] การแต่งหน้าในวันหยุด</h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/04_3.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="box">
                                            <a href="#"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip] แต่งหน้าลุคเสือดาว</h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/03_3.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="box">
                                            <a href="#"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip] การใช้งาน Lacquer</h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/02_4.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="box">
                                            <a href="#"
                                               class="video_link">
                                                <div class="video_txt">
                                                    <h6 class="letters">[Artist tip] ลุคฤดูใบไม้ร่วงคลาสสิก</h6>
                                                    <p class="letters"></p>
                                                </div>
                                                <div class="video-thumbnail">
                                                    <img width="683" height="1024"
                                                         src="/jsmbeauty/src/ArtistTip/01_5.jpg"
                                                         class="attachment-large size-large wp-post-image" alt="4">
                                                </div>
                                            </a>
                                            <hr class="clear sm">
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--.bbs-table-list-->
                    <div class="bbs-sch displaynone">
                        <form action="board.html" name="form1">
                            <input type=hidden name=s_id value="">
                            <input type=hidden name=code value="jsmbeauty_image2">
                            <input type=hidden name=page value=1>
                            <input type=hidden name=type value=s>
                            <input type=hidden name=board_cate value="5">
                            <input type=hidden name="review_type" value="" />
                            <fieldset>
                                <legend class="displaynone">ค้นหากระดานข่าว</legend>
                                <label>
                                    <select name="search_type" class="brd-st">
                                        <option value="">การเลือก</option>
                                        <option value="hname">ชื่อ</option>
                                        <option value="subject">เรื่อง</option>
                                        <option value="content">สารบัญ</option>

                                    </select> </label>
                                <span class="key-wrap">
                                <input type='text' name='stext' value='' class="MS_input_txt" /> <a
                                        href="javascript:document.form1.submit();" class="btn btn-gray"><i
                                            class="fa fa-search"></i> การแก้ไข</a>
                            </span>
                            </fieldset>
                        </form>
                    </div><!-- .bbs-sch -->
                    <dl class="bbs-link bbs-link-btm displaynone">
                        <dd>
                            <a class="write"
                               href="/board/board.html?code=jsmbeauty_image2&page=1&board_cate=5&type=i">การเขียน</a>
                        </dd>
                    </dl>
                    <nav class="text-center">
                        <ul class="pagination">
                            <li><span class="page-numbers current">1</span></li>
                            <li><a href="/artist/tip2" class="page-numbers">2</a></li>
                            <!-- <li><a href="/artist/tip03" class="page-numbers">3</a></li>
                            <li><a href="/artist/tip04" class="page-numbers">4</a></li>
                            <li><a href="/artist/tip05" class="page-numbers">5</a></li>
                            <li><a href="/artist/tip06" class="page-numbers">6</a></li> -->
                            <!-- <li><a href="/artist/tip"
                                    class="page-numbers">7</a></li>
                            <li><a href="/artist/tip"
                                    class="page-numbers">8</a></li> -->
                            <!-- <li class="last"><a
                                    href="/board/board.html?code=jsmbeauty_image2&page=8&board_cate=5#board_list_target"
                                    class="last page-numbers end"><i class="fa fa-forward"></i></a></li> -->
                        </ul>
                    </nav>
                </div>
            </div><!-- .page-body -->

        </div><!--#ju-content-->
    </div><!--#ju-container-->
    <!-- //content -->


@endsection


