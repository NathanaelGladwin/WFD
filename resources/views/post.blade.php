@extends('base.base')

@section('content')
<div>
    <h1>Post Page</h1>
    <div class="blog-slider">
        <div class="blog-slider__wrp swiper-wrapper">
          <div class="blog-slider__item swiper-slide">
            <div class="blog-slider__img">
              
              <img src="https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1535759872/kuldar-kalvik-799168-unsplash.webp" alt="">
            </div>
            <div class="blog-slider__content">
              <span class="blog-slider__code">26 December 2019</span>
              <div class="blog-slider__title">Lorem Ipsum Dolor</div>
              <div class="blog-slider__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae voluptate repellendus magni illo ea animi? </div>
              <a href="#" class="blog-slider__button">READ MORE</a>
            </div>
          </div>
          <div class="blog-slider__item swiper-slide">
            <div class="blog-slider__img">
              <img src="https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1535759871/jason-leung-798979-unsplash.webp" alt="">
            </div>
            <div class="blog-slider__content">
              <span class="blog-slider__code">26 December 2019</span>
              <div class="blog-slider__title">Lorem Ipsum Dolor2</div>
              <div class="blog-slider__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae voluptate repellendus magni illo ea animi?</div>
              <a href="#" class="blog-slider__button">READ MORE</a>
            </div>
          </div>
          
          <div class="blog-slider__item swiper-slide">
            <div class="blog-slider__img">
              <img src="https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1535759871/alessandro-capuzzi-799180-unsplash.webp" alt="">
            </div>
            <div class="blog-slider__content">
              <span class="blog-slider__code">26 December 2019</span>
              <div class="blog-slider__title">Lorem Ipsum Dolor</div>
              <div class="blog-slider__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae voluptate repellendus magni illo ea animi?</div>
              <a href="#" class="blog-slider__button">READ MORE</a>
            </div>
          </div>
          
        </div>
        <div class="blog-slider__pagination"></div>
      </div>
</div>    
@endsection