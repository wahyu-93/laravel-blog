@extends('front.layout.template')

@section('title', 'Bee Blog | Blog Pribadi')

@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4" data-aos="fade-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d248.96424356436466!2d116.23807638428599!3d-3.2432756972916668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1spom%20bensin%20baharu!5e0!3m2!1sen!2sid!4v1751960012935!5m2!1sen!2sid" 
                    width="100%" height="450" style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>

                <div class="card-body">
                    <h2>Contact Web Blog</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate quo possimus at magni odio excepturi laudantium tempora ab modi maxime nostrum animi, dignissimos ipsum impedit, architecto culpa nulla aspernatur dolore!</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex, nesciunt. Distinctio iste quis officia nihil minus error perspiciatis tempora non atque explicabo reprehenderit odio porro, alias earum quaerat. Fugiat, architecto.</p>
                    <ul>
                        <li>Youtube</li>
                        <li>Facebook</li>
                        <li>Instagram</li>
                    </ul>
                </div>
            </div>

            <!-- Nested row for non-featured blog posts-->
            <div class="row">
              
            </div>

        </div>
        <!-- Side widgets-->
        @include('front.layout._side-widget')
    </div>
</div>
@endsection