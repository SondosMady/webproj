<section>
    <section id="content">
        <section id="news">
            <h1>News</h1>
            <form action="headmaster_page.php" method="post">
                <input placeholder="News Title" name="title">
                <textarea placeholder="Here goes the content of the news..." name="content"></textarea>
                <button>Post</button>
            </form>
        </section>
        <section id="events">
            <h1>Events</h1>
            <form action="postEvent.php" method="post">
                <input placeholder="Event Title" name="name">
                <p>Event Date</p>
                <select name="day" title="Day">
                    <option value="0">Day</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29" selected="1">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
                <select name="month" title="Month">
                    <option value="0">Month</option>
                    <option value="1">Jan</option>
                    <option value="2">Feb</option>
                    <option value="3">Mar</option>
                    <option value="4">Apr</option>
                    <option value="5" selected="1">May</option>
                    <option value="6">Jun</option>
                    <option value="7">Jul</option>
                    <option value="8">Aug</option>
                    <option value="9">Sept</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                </select>
                <select name="year" title="Year">
                    <option value="0">Year</option>
                    <option value="2018" selected="1">2018</option>
                    <option value="2029">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
                <button>Post</button>
            </form>
        </section>
    </section>
</section>