<?php 
// require_once("html/connect.php");

$connect = new PDO("mysql:host = localhost; dbname = all-games","root","");

$limit = 12;
$page = 1;

if($_POST['page']>1)
{
    $start =(($_POST['page'] - 1) * $limit);
    $page = $_POST['page'];
}
else
{
    $start = 0;
}

$query = "SELECT * FROM `all-games` ";
// $id = $_GET['id'];
// switch($id){
//     case 'FPS': $query = "SELECT * FROM `all-games` as ag WHERE ag.Tags LIKE '%FPS%'";
//         break;
//     case 'RPG': $query = "SELECT * FROM `all-games` as ag WHERE ag.Tags LIKE '%RPG%'";
//         break;
//     case 'Action': $query = "SELECT * FROM `all-games` as ag WHERE ag.Tags LIKE '%Action%'";
//         break;
//     default: $query = "SELECT * FROM `all-games` WHERE 1";
// }

if($_POST['query'] != '')
{
    $query .= "WHERE name LIKE '%".str_replace(' ','%',$_POST['query'])."%'";
}

$filter_query = $query . "LIMIT ".$start. ", ".$limit.'';

$statement =mysqli_query($connect,$query);

$total_data = mysqli_num_rows($statement);

$statement = mysqli_query($connect,$filter_query);

$result = mysqli_fetch_array($statement);

$output ="<span> Kết quả hiển thị: ".$total_data."</span>";

if($total_data >0)
{
    while($result)
    {
        $output .= '<div class="box" id="box" >
        <a href="./html/'.$row['link'].'" target="_blank" >
            <div class="image">
                <img src="'.$row['image'].'" >
            </div>
            <div class="box-text">
                <h2>'.$row['name'].'</h2>
                <h3>'.$row["Tags"].'</h3>
            </div>
        </a>
        </div>';
    }
}
else
{
    $output .="Không hiển thị kết quả";   
}

$output .= '<div class="pagination">';

$total_links = ceil($total_data/$limit);
$prev = '';
$next = '';
$page_link = '';

if($total_links > 4)
{
    if($page < 5)
    {
        for($count = 1; $count <= 5; $count++)
        {
            $page_array[] = $count;
        }  
        $page_array[] = '...';
        $page_array[] = $total_links;
    }
    else
    {
        $end_limit = $total_links - 5;
        if($page > $end_limit)
        {
            $page_array[] = 1;
            $page_array[] = '...';
            for($count = $end_limit; $count <= $total_links; $count++)
            {
                $page_array[] = $count; 
            }
        }
        else
        {
            $page_array[] = 1;
            $page_array[] = '...';
            for($count = $page - 1;$count <= $page + 1;$count++)
            {
                $page_array[] = $count; 
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
        }
    }
}
else
{
    for($count = 1; $count <= $total_links; $count++)
    {
        $page_array[] = $count;
    }
}

for($count = 0; $count < count($page_array);$count++)
{
    if($page == $page_array[$count])
    {
        $page_link .='
        <li class="page-item active current-page">
            <a class="page-link" href="#">'.$page_array[$count].'
            </a>
        </li>    
        ';

        $prev_id = $page_array[$count] - 1;
        if($prev_id > 0)
        {
            $prev = '<li class="page-item">
                        <a class="page-link" href="javascript:void(0)" 
                            data-page_number="'.$prev_id.'">Prev</a>
                    </li>';
        }
        else
        {
            $prev ='<li class="page-item disable">
                        <a class="page-link" href="#">Prev</a>
                    </li>';
        }

        $next_id = $page_array[$count] + 1;

        if($next_id >= $total_links)
        {
            $next ='<li class="page-item disable">
                        <a class="page-link" href="#">Next</a>
                    </li>';
        }
        else
        {
            $next = '<li class="page-item">
                         <a class="page-link" href="javascript:void(0)" 
                             data-page_number="'.$next_id.'">Next</a>
                     </li>';
        }
    }
    else
    {
        if($page_array[$count] == '...')
        {
            $page_link .='<li class="page-item disable">
                            <a class="page-link" href="#">...</a>
                          </li>';
        }
        else
        {
            $page_link .='<li class="page-item">
                                <a class="page-link" href="javascript:void(0)" 
                                    data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a>
                          </li>';
        }
    }
}

$output .= $prev.$page_link.$next;
echo $output;
?>