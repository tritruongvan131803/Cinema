<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container"> <a class="navbar-brand" href="#">DZCinema</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                    aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <router-link to="/">
                            <li class="nav-item"> <a class="nav-link " aria-current="page" href="#">Trang
                                    Chủ</a>
                            </li>
                        </router-link>
                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Phim
                            </a>
                            <ul class="dropdown-menu">
                                <router-link to="/phim">
                                    <li><a class="dropdown-item" href="/phim">Phim Đang Chiếu</a>
                                    </li>
                                </router-link>
                                <router-link to="/phim">
                                    <li><a class="dropdown-item" href="/phim">Phim Sắp Chiếu</a>
                                    </li>
                                </router-link>
                            </ul>
                        </li>
                        <router-link to="/chi-tiet-phim">
                            <li class="nav-item"> <a class="nav-link" href="/chi-tiet-phim">Chi Tiết Phim</a>
                            </li>
                        </router-link>
                        <router-link to="/bai-viet">
                            <li class="nav-item"> <a class="nav-link" href="/bai-viet">Bài Viết</a>
                            </li>
                        </router-link>
                        <router-link to="/chi-tiet-bai-viet">
                            <li class="nav-item"> <a class="nav-link" href="/chi-tiet-bai-viet">Chi Tiết Bài Viết</a>
                            </li>
                        </router-link>
                        <router-link to="/about">
                            <li class="nav-item"> <a class="nav-link" href="/about">Về chúng tôi</a>
                            </li>
                        </router-link>
                    </ul>
                    <form class="d-flex nav-search">
                        <div class="px-1 my-1 py-1 border radius-30">
                            <div class="dropdown">
                                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../../assets/images/avatars/avatar-2.png" class="user-img"
                                        style="height: 35px; object-fit: cover;">
                                    <div class="user-info ps-3 pe-3">
                                        <p class="user-name mb-0 text-light">Pauline Seitz</p>
                                        <p class="designattion mb-0">@username</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <router-link to="/client/profile">
                                    <li><a class="dropdown-item" href="javascript:;"><i
                                                class="bx bx-user"></i><span>Profile</span></a>
                                    </li>
                                    </router-link>
                                    <li><a class="dropdown-item" href="javascript:;"><i
                                                class="bx bx-log-out-circle"></i><span>Logout</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </nav>
    </header>
</template>
<script>
export default {

}
</script>
<style></style>