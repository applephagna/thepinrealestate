<div class="user-content mt-3">
    <div class="list-posts">
        <form method="get" action="https://www.khmer24.com/en/p-70393143" id="filter-form">
            <div class="bar">
                <div class="left">
                    <h2 class="title">4 Result On 17 Aug, 2020 </h2>
                </div>
                <div class="right text-right">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <label>View</label>
                            <span class="btn-group mr-1" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-default icon icon-list btn-change-view"></button>
                            <button type="button" class="btn btn-default icon-gallery btn-change-view" disabled=""></button>
                            </span>
                        </li>
                        <li class="nav-item dropdown">
                            <label>Sort By</label>
                            <a class="btn btn-default btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Laste Ads </a>
                            <div class="dropdown-menu btn-sortby" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item " data-value="latestads" href="#">Laste Ads</a>
                                <a class="dropdown-item " data-value="newads" href="#">New Ads</a>
                                <a class="dropdown-item " data-value="mosthitads" href="#">Most Hit Ads</a>
                            </div>
                            <input type="hidden" name="sortby" value="">
                        </li>
                    </ul>
                </div>
            </div>
        </form>
        <div>
            <ul class="list-unstyled list-items item-grid">
                <li class="item ">
                    <a class="border post" href="https://www.khmer24.com/en/គមរងដឡថម-adid-4872699.html" title="គម្រោងដីឡូថ្មី">
                    <article>
                        <div class="item-image">
                            <img class="img-cover" src="http://imagescdn.khmer24.com/19-05-04/s-369136-51-b.jpg" alt="គម្រោងដីឡូថ្មី">
                        </div>
                        <div class="item-detail">
                            <h3 class="item-title truncate truncate-2 ">គម្រោងដីឡូថ្មី</h3>
                            <ul class="list-unstyled summary">
                                <li>Siem Reap</li>
                                <li><time datetime="2020-08-10 20:52:33">10-Aug-2020</time></li>
                            </ul>
                            <p class="item-price m-0 text-red">$650</p>
                        </div>
                    </article>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.btn-change-view').click(function(e){
                e.preventDefault();
                var type = $(this).attr('data-type');
                $.get('https://www.khmer24.com/en/change-ad-view.html',function(respone){
                    location.reload();
                });
            });

            $('.btn-sortby a').click(function(e){
                e.preventDefault();
                $('body').find('input[name="sortby"]').val($(this).attr('data-value'));
                $('#filter-form').submit();
            });
        });
    </script>
</div>