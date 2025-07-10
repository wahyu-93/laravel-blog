@extends('front.layout.template')

@section('title', 'Bee Blog | Blog Pribadi')

@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4" data-aos="fade-right">
                 <a href="#">
                    <img class="mt-3 mx-auto d-block feature-about" src="{{ asset('front/img/about.jpeg') }}" alt="belum ada foto" />
                </a>

                <div class="card-body">
                    <h2>About Web Blog</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate quo possimus at magni odio excepturi laudantium tempora ab modi maxime nostrum animi, dignissimos ipsum impedit, architecto culpa nulla aspernatur dolore!</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex, nesciunt. Distinctio iste quis officia nihil minus error perspiciatis tempora non atque explicabo reprehenderit odio porro, alias earum quaerat. Fugiat, architecto.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, culpa! Harum voluptates nam fuga. Reprehenderit deleniti, quae omnis praesentium unde explicabo! Consequatur obcaecati magni consectetur assumenda voluptatibus, ab iste consequuntur?</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima voluptatibus vel quidem nam quasi eveniet voluptatum recusandae animi rem mollitia. Provident, rem. Inventore aperiam pariatur ut rerum explicabo natus laboriosam?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, iusto! Quod et dolore ad, sunt omnis ea ipsam sint, itaque totam cupiditate quos incidunt harum eaque! At, quos! Rerum, iste.</p>
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