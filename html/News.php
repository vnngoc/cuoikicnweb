<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Gaming Kai </title>
		<!-------Icon Tab------->
		<link rel="shortcut icon" type="x-icon" href="https://i.imgur.com/jsGW21W.png">

		<!-----custom-------->
		<!-- <link rel="stylesheet" href ="../css/style.css"> -->
        <link rel="stylesheet" href ="../css/news-style.css">


		<!----normalize------->
		<link rel="stylesheet" href ="../css/normalize.css">
		<!----fontawesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
		 crossorigin="anonymous" referrerpolicy="no-referrer" />
         <!---JQUERY---->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
		integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	
	</head>

<body> 
<?php  include_once '../inc/navbar.php'; ?>

<!------News section start-->
<section id="news">
    <!-- <div id="search-container" class="search-container">

        <input type="text" id="search-input" placeholder="Tìm kiếm"
            onkeyup="search()" />
        <i class="fa-solid fa-magnifying-glass"></i>  -->
        <!-- <button id="search">
                <i class="fa-solid fa-magnifying-glass"></i> 
        </button> -->
        
        <!-- <div class="category-filter" id="category-filter">
            <a href="./all-game.html"><span class="filter-item active-tag" > All </span> </a> 
            <a href="./FPS-game.html"><span class="filter-item" > FPS </span> </a> 
            <a href="./Action-game.html"> <span class="filter-item" > Action </span></a> 
            <a href="./RPG-game.html"><span class="filter-item"> RPG </span> </a> 
            

        </div> -->
    </div>

	<div class="news-container" id="content">
		<!---------Lastest------------->
		<div class="Lastest-news">
			<h3>Mới nhất</h3>
			<article class="box">
				<div class="item-img">
					<img src="https://i.imgur.com/MBdjbhz.png">
				</div>

				<div class="item-text" >
					<a href="#" class="item-title" id="title">
					   <span class="category"> Lastest </span> 
                        <h2> Đây sẽ là cái tiêu đề của cái tin </h2>
				   </a>
					   <!---Ttile video here----->
					   <p class="text">
						   Đây sẽ là phần mô tả bổ sung thêm của cái tin đó nếu chịu lên mạng copy về
						   <!---Description--->
					   </p>
					   <div class="item-date"> Tin game | Mới nhất | 1/7/2021 </div>
   
			   </div>
			</article>
          
			
		</div>
		<!---------Lastest end------------->
	<!---------------------------------------------------->	
		<!---------Popular------------->
		<div class="Popular-news">
			<h3>Phổ biến</h3>
			<div class="pop-list">
				<article class="box">
					<div class="item-img">
						<img src="https://i.imgur.com/MBdjbhz.png">
					</div>
	
					<div class="item-text">
						<a href="#" class="item-title" id="title">
						   <span class="category"> Popular </span> 
                           <h2> Đây sẽ là cái tiêu đề của cái tin </h2> 
					   </a>
						   <!---Ttile video here----->
						   <p class="text">
							   Đây sẽ là phần mô tả bổ sung thêm của cái tin đó nếu chịu lên mạng copy về
							   <!---Description--->
						   </p>
						   <div class="item-date"> Tin game | Phổ biến | 1/7/2021 </div>
	   
				   </div>
				</article>
                
               

				

			</div>
       
            

		</div>
		<!---------Popular end------------->
		
        <div class="pagination">
            <!-- <div class="previous-page"><i class="fa-solid fa-angle-left"></i></div>
            <div class="page">Page <span class="page-num"></span></div>
            <div class="next-page"><i class="fa-solid fa-angle-right"></i></div> -->
        </div>
	</div>
    
<script>
   const search = () =>{
    const searchBox = document.getElementById("search-input").value.toUpperCase();
    const storeItems = document.getElementById("content")
    const gameBox = document.getElementsByTagName("article")
    const gameName = storeItems.getElementsByTagName("h2")
    

    for(var i=0; i < gameName.length; i++)
    {
        let match = gameBox[i].getElementsByTagName('h2')[0];
        if(match)
        {
            let textValue = match.textContent || match.innerHTML

            if(textValue.toUpperCase().indexOf(searchBox) > -1 )
            {
                gameBox[i].classList.remove("hide");
                gameBox[i].classList.add("show");
            }
            else
            {
                gameBox[i].classList.remove("show");
                gameBox[i].classList.add("hide");
            }
        }
    }


}

</script>

</section>
<!------News section end-->
<!---------Footer start------->
<footer id="footer" class="footer">
	<div class="footer-container">
		<div class="footer-link-1">
			<img class ="logo" src="https://i.imgur.com/IIfskYh.png" >
			<ul class="flex">
				<li>
					<a href="#">
						<i class="fa-brands fa-facebook-f"></i>
					 </a>
				</li>
				<li>
					<a href="#">
						<i class="fa-brands fa-youtube"></i>
					 </a>
				</li>
				<li>
					<a href="#">
						<i class="fa-brands fa-facebook-messenger"></i>
					 </a>
				</li>
				<li>
					<a href="#">
						<i class="fa-brands fa-twitter"></i>
					 </a>
				</li>
				<li>
					<a href="#">
						<i class="fa-brands fa-discord"></i>
					 </a>
				</li>
			
			</ul>
		</div>

		<div class="footer-link-2">
			<ul class="flex">
				<li>
					<a href="#">
						Cái mục
					 </a>
				</li>
				<li>
					<a href="#">
						Nhìn 
					 </a>	
				</li>
				<li>
					<a href="#">
						Cho
					 </a>
				</li>
				<li>
					<a href="#">
						Chuyên Nghiệp
					 </a>
				</li>
			</ul>
			<p class="text">&copy; GAMING KAI | COPYRIGHT</p>
		</div>
	</div>
</footer>

<!---------Footer end------->


<!------Script------->
<script src="../js/Script.js">  </script>
<!-- <script src="../js/pagination.js">  </script>
<script src="../js/search.js">  </script> -->


<!------Script end------>
	</body>
</html>