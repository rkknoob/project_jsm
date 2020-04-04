function onopen(i){ // 사업자등록번호 조회
    var url = "http://www.ftc.go.kr/info/bizinfo/communicationViewPopup.jsp?wrkr_no="+i;
    window.open(url, "communicationViewPopup", "width=750, height=700;");
}