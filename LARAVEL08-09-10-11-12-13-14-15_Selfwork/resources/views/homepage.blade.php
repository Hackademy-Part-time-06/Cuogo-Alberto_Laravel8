<x-main>
    <x-slot name="title">LIBRARY | Homepage</x-slot>

        <div class="row g-4 text-center align-items-center min-vh-75 mt-3">
            <div class="col-4">
                <div class="card pb-4 border-0 shadow">
                    <img src="\img\books.png" class="card-img-top position-absolute w-50 bottom-75 start-25" alt="books">
                    <div class="card-body mt-5 pt-5">
                      <h5 class="card-title fw-bold fs-2 mt-4">BOOKS</h5>
                      <p class="card-text  mt-3 px-4">"Discover the best books to enjoy the wonderful world of reading."</p>
                      <a href="{{route('books.index')}}" class="btn btn-lg btn-warning fw-bold text-white mt-4 shadow">All Books</a>
                    </div>
                  </div>
            </div>
            <div class="col-4">
                <div class="card pb-4 border-0 shadow">
                    <img src="\img\authors.png" class="card-img-top position-absolute w-50 bottom-75 start-25" alt="books">
                    <div class="card-body mt-5 pt-5">
                      <h5 class="card-title fw-bold fs-2 mt-4">AUTHORS</h5>
                      <p class="card-text mt-3 px-4">"Discover the best authors of stories and books in one place."</p>
                      <a href="{{route('authors.index')}}" class="btn btn-lg btn-primary fw-bold mt-4 shadow">All Authors</a>
                    </div>
                  </div>
            </div>
            <div class="col-4">
                <div class="card pb-4 border-0 shadow">
                    <img src="\img\category.png" class="card-img-top position-absolute w-50 bottom-75 start-25" alt="books">
                    <div class="card-body mt-5 pt-5">
                      <h5 class="card-title fw-bold fs-2 mt-4">CATEGORIES</h5>
                      <p class="card-text mt-3 px-4">"Discover the best book categories to dive into a world of amazing reads."</p>
                      <a href="{{route('categories.index')}}" class="btn btn-lg btn-danger fw-bold mt-4 shadow">All Categories</a>
                    </div>
                  </div>
            </div>
        </div>

</x-main>