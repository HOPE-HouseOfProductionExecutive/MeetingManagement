<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/Assets/js/pagination.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/Assets/css/user/pagination/style.css">

</head>
<body onload="getData(0);">
    
    <section id="table">
        <table>
            <thead>
                <th>No</th>
                <th>Waktu</th>
                <th>Judul</th>
            </thead>
            <tbody id="content-table-body">
                
            </tbody>
        </table>
    </section>
    <footer class="center-align">
        <ul class="pagination">
            <li class="disabled arrow-left"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!">6</a></li>
            <li class="waves-effect"><a href="#!">7</a></li>
            <li class="waves-effect"><a href="#!">8</a></li>
            <li class="waves-effect"><a href="#!">9</a></li>
            <li class="waves-effect"><a href="#!">10</a></li>
            <li class="waves-effect arrow-right"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </footer>
</body>

<script>

    function getData(index){
        $.get('/pagination/ajax', function (data) {
            // console.log(data);
    
            let tableBody = document.getElementById("content-table-body");
            let total = 1;
            let html= "";
            for(let i = index; i < data.length && total <= 10 ; i++){
                html += "<tr>";
                
                html += "<td>" + (i+1) + "</td>";
                html += "<td>" + data[i].waktu_rapat + "</td>";
                html += "<td>" + data[i].judul + "</td>";
    
                total += 1;
                html += "</tr>";
            }
    
            tableBody.innerHTML = html;
    
    
        });
    }

    


    function handleNumberClick (clickedLink, leftArrow, rightArrow)
    {
        
        console.log(clickedLink);
        clickedLink.parentElement.classList = "active";
        let clickedLinkPageNumber = parseInt(clickedLink.innerText); 
        console.log((clickedLinkPageNumber*10) - 10);
        getData(((clickedLinkPageNumber * 10) - 10));
        

        // switch (clickedLinkPageNumber) {
        //     case 1:
        //         disableLeftArrow();
        //         if(rightArrow.className.indexOf("disabled") !== -1) {
        //             enableRightArrow();
        //         }
        //         break;
        //     case 10:
        //         break;
        //     default:
        //         break;
        // }
    }

    function handleLeftArrowClick()
    {

    }

    function handleRightArrowClick()
    {

    }

    function disableLeftArrow(){
        
    }
    function enableLeftArrow(){

    }

    function disableRightArrow(){
        
    }
    function enableRightArrow(){

    }

    let pageLinks = document.querySelectorAll('a');
    let activePageNumber;
    let clickedLink;
    let nextPage;
    let leftArrow;
    let rightArrow;
    let url = '';
    pageLinks.forEach((element) => {
        element.addEventListener("click", function() {
            leftArrow = document.querySelector('.left-arrow');
            rightArrow = document.querySelector('.right-arrow');
            activeLink = document.querySelector('.active');
            
            activePageNumber = parseInt(activeLink.innerText);
            
            if ((this.innerText === 'chevron_left' && activePageNumber === 1) || (this.innerText === 'chevron_right' && activePageNumber === 10)) {
            return;
            }

            activeLink.classList = "waves-effect";
            activeLink.classList.remove('active');

            if(this.innerText === 'chevron_left'){
                handleLeftArrowClick();
            }else if (this.innerText === 'chevron_right'){
                handleRightArrowClick();
            }else {
                handleNumberClick(this, leftArrow, rightArrow);
            }

        });
        
    });
    
</script>
</html>

