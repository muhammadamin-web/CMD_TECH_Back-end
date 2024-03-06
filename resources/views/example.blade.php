<div class="container">
 

</h1>
<p>{{ __('welcome') }}</p>
<p>{{ __('app.welcome') }}
<p>{{ __('app.welcome') }}

</p>
        <div class="row">
            <h1>products</h1>
            @foreach($products as $product)
                <div class="col-md-4 col-sm-6 my-3">
                    <div class="card">
                        @if($product->image_path)
                            <img src="{{ asset($product->image_path) }}" alt="{{ $product->image_name }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                            <a href="{{ route('product.show', [app()->getLocale(), $product->id]) }}">{{ $product->{'name_' . app()->getLocale()} }}</a>
                            </h5>
                            <p class="card-text">{{ $product->{'description_' . app()->getLocale()} }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <h1>projects</h1>
        @foreach($projects as $key => $project)
            <div class="col-md-4">
                <div class="card {{ 'card-style-' . ($key % 3 + 1) }}"> <!-- Har bir karta uchun alohida stil beramiz -->
                    <img src="{{ $project->image_path }}" class="card-img-top" alt="{{ $project->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <a href="{{ route('project.show', ['locale' => app()->getLocale(), 'project' => $project->id]) }}" class="btn btn-primary">Batafsil</a>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <section class="new_container" id="news">
    <div class="container">
        <h2 class="container_title lang">{{ __('app.new') }}</h2>
        <div class="new_box">
            @foreach($crud_one as $news)

            <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'slug' => $news->{'slug_' . app()->getLocale()}]) }}" class="new_link ">
                <div class="new_card ">
                    <img class="new_card_img" src="{{ asset($news->image_path) }}" alt="" />
                    <div class="new_card_text1">
                        <div class="text_row1">
                            <h2>{{ Str::limit($news->{'name_' . app()->getLocale()}, 20) }}</h2>
                            <!-- <h4>Tailand Qirolligi</h4> -->
                        </div>
                        <div class="text_row2">
                            <a class="row2_link" href="tel:+998972680088">+998(97)268-00-88</a>
                        </div>
                    </div>
                    <h2 class="new_subtitle1">{{ Str::limit($news->{'name_' . app()->getLocale()}, 20) }}</h2>
                    <p class="new_subtitle2">{{ Str::limit($news->{'meta_description_' . app()->getLocale()}, 50) }}</p>
                    <div class="new_card_text2">
                        <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'slug' => $news->{'slug_' . app()->getLocale()}]) }}">{{ __('app.more') }}</a>
                        <div class="new_card_icon">
                            <img class="" src="{{ asset('images/static_img/calendar-249.png') }}" alt="" />
                            <p class="news_card_date">{{ $news->created_at_formatted }}</p> <!-- Bu yerda o'zgarish qilindi -->
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

        </div>
        <div class="slider_btn_box">
            <button class="slider-btn prev-btn">&#10094;</button>
            <button class="slider-btn next-btn">&#10095;</button>
        </div>
</section>

    <div class="projects" id="projects">
    <h2 class=" lang" key="projects">{{ __('app.projects') }}</h2>

    <div class="big">
        <?php $counter = 1; ?>
        <?php foreach ($projects as $project) : ?>

            <a href="{{ route('project.show', ['locale' => app()->getLocale(), 'slug' => $project->{'slug_' . app()->getLocale()}]) }}" class="img-wrapper_container<?= $counter; ?>">
                <div class="img-wrapper">
                    <img id="" class="inner-img" src="{{ asset($project->image_path) }}" />
                    <div class="middle">
                        <div class="text lang" key="projects">{{ $project->{'name_' . app()->getLocale()} }}</div>
                        <!-- <p class="more lang" key="more">{{ __('app.more') }}</p> -->
                    </div>
                </div>
            </a>

            <?php $counter++; ?>
        <?php endforeach; ?>
    </div>
</div>
<div class="products" id="products">
    <h2 class="lang" key="products_category">{{ __('app.products') }}</h2>



    <div class="products_container">

        @foreach($categories as $category)

        <a href="{{ route('category.show', ['locale' => app()->getLocale(), 'slug' => $category->{'slug_' . app()->getLocale()}]) }}" class="product_card">

            <div class="product_img_wrapper">
                <img class="product_inner-img" src="{{ asset($category->image_path) }}" />
                <div class="product_middle">
                    <div class="product_text lang" key="products1">{{ $category->{'name_' . app()->getLocale()} }}</div>
                </div>
            </div>
        </a>
        @endforeach

    </div>


</div>




<form action="{{ route('home.lead', ['locale' => app()->getLocale()]) }}" method="POST" id="leadForm">
    @csrf <!-- CSRF token -->

    <div class="form-group">
        <label for="name">Ism:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="phone">Telefon Raqami:</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>

    <div class="form-group">
        <label for="email">Email Manzili:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="description">Tavsif:</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Yuborish</button>
</form>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('leadForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            fetch("{{ route('home.lead', ['locale' => app()->getLocale()]) }}", {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        // Modalni ko'rsatish
                        $('#successModal').modal('show');

                        // 1.5 soniyadan keyin modalni yopish
                        setTimeout(function() {
                            $('#successModal').modal('hide');
                        }, 3000);
                    }
                })
                .catch(error => console.error('Xatolik:', error));
        });

    });
</script>

<!-- Muvaffaqiyatli murojaat modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal tarkibi -->

            <h1>Murojaat jo'natildi</h1>
        </div>
    </div>
</div>

