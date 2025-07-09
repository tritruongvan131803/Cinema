<template>
	<div class="nav-container primary-menu">
		<div class="mobile-topbar-header">
			<div>
				<img src="../../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
			</div>
			<div>
				<h4 class="logo-text">Rukada</h4>
			</div>
			<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
			</div>
		</div>
		<nav class="navbar navbar-expand-xl w-100">
			<ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
				<router-link to="/admin">
					<li class="nav-item">
						<a class="nav-link" href="/admin">
							<div class="parent-icon">
								<i class="bx bx-home-circle"></i>

							</div>
							<div class="menu-title">Dashboard</div>
						</a>
					</li>
				</router-link>
				<li class="nav-item dropdown">
					<a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret show"
						data-bs-toggle="dropdown" aria-expanded="true">
						<div class="parent-icon"><i class="fa-solid fa-user-group"></i>
						</div>
						<div class="menu-title">Quản lý tài khoản</div>
					</a>
					<ul class="dropdown-menu show" data-bs-popper="static">
						<router-link to="/admin/nhan-vien">
							<li>
								<a class="dropdown-item" href="/admin/nhan-vien"><i
										class="bx bx-right-arrow-alt"></i>Tài Khoản Nhân
									viên</a>
							</li>
						</router-link>
						<router-link to="/admin/khach-hang">
							<li>
								<a class="dropdown-item" href="/admin/khach-hang"><i
										class="bx bx-right-arrow-alt"></i>Tài khoản Khách
									hàng</a>
							</li>
						</router-link>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret show"
						data-bs-toggle="dropdown" aria-expanded="true">
						<div class="parent-icon"><i class="fa-solid fa-film"></i>
						</div>
						<div class="menu-title">Quản lý phim</div>
					</a>
					<ul class="dropdown-menu show" data-bs-popper="static">
						<router-link to="/admin/phim">
							<li>
								<a class="dropdown-item" href="/admin/phim"><i
										class="bx bx-right-arrow-alt"></i>Phim</a>
							</li>
						</router-link>
						<router-link to="/admin/suat-chieu">
							<li>
								<a class="dropdown-item" href="/admin/suat-chieu"><i
										class="bx bx-right-arrow-alt"></i>Suất chiếu</a>
							</li>
						</router-link>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret show"
						data-bs-toggle="dropdown" aria-expanded="true">
						<div class="parent-icon"><i class="fa-solid fa-person-shelter"></i>
						</div>
						<div class="menu-title">Quản lý phòng chiếu</div>
					</a>
					<ul class="dropdown-menu show" data-bs-popper="static">
						<router-link to="/admin/phong-chieu">
							<li>
								<a class="dropdown-item" href="/admin/phong-chieu"><i
										class="bx bx-right-arrow-alt"></i>Phòng chiếu</a>
							</li>
						</router-link>
						<router-link to="/admin/ghe">
							<li>
								<a class="dropdown-item" href="/admin/ghe"><i class="bx bx-right-arrow-alt"></i>Ghế</a>
							</li>
						</router-link>
					</ul>
				</li>
				<router-link to="/admin/dich-vu">
					<li class="nav-item">
						<a class="nav-link" href="/admin/dich-vu">
							<div class="parent-icon">
								<i class="fa-brands fa-servicestack"></i>

							</div>
							<div class="menu-title">Dịch Vụ</div>
						</a>
					</li>
				</router-link>
				<router-link to="/admin/voucher">
					<li class="nav-item">
						<a class="nav-link" href="/admin/	voucher">
							<div class="parent-icon">
								<i class="fa-solid fa-ticket"></i>
							</div>
							<div class="menu-title">Voucher</div>
						</a>
					</li>
				</router-link>
				<router-link to="/admin/phan-quyen">
					<li class="nav-item">
						<a class="nav-link" href="/admin/phan-quyen">
							<div class="parent-icon">
								<i class="fa-solid fa-user-shield"></i>
							</div>
							<div class="menu-title">Phân Quyền</div>
						</a>
					</li>
				</router-link>
				<li class="nav-item dropdown">
					<a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret show"
						data-bs-toggle="dropdown" aria-expanded="true">
						<div class="parent-icon"><i class="fa-solid fa-ticket"></i>
						</div>
						<div class="menu-title">Vé</div>
					</a>
					<ul class="dropdown-menu show" data-bs-popper="static">
						<router-link to="/admin/ve">
							<li>
								<a class="dropdown-item" href="/admin/ve"><i
										class="bx bx-right-arrow-alt"></i>Danh sách vé</a>
							</li>
						</router-link>
						<router-link to="/admin/soat-ve">
							<li>
								<a class="dropdown-item" href="/admin/soat-ve"><i
										class="bx bx-right-arrow-alt"></i>Tìm vé</a>
							</li>
						</router-link>
					</ul>
				</li>
				<router-link to="/admin/bai-viet">
					<li class="nav-item">
						<a class="nav-link" href="/admin/bai-viet">
							<div class="parent-icon">
								<i class="fa-solid fa-newspaper"></i>
							</div>
							<div class="menu-title">Bài Viết</div>
						</a>
					</li>
				</router-link>
				<router-link to="/admin/don-hang">
					<li class="nav-item">
						<a class="nav-link" href="/admin/don-hang">
							<div class="parent-icon">
								<i class="fa-solid fa-square-check"></i>
							</div>
							<div class="menu-title">Đơn Hàng</div>
						</a>
					</li>
				</router-link>
			</ul>
		</nav>
	</div>
</template>
<script>
export default {

}
</script>
<style></style>