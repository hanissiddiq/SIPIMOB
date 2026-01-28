<div id="BottomNav" class="relative flex w-full h-[138px] shrink-0">
            <nav class="fixed bottom-5 w-full max-w-[640px] px-5 z-10">
                <div class="grid grid-cols-4 h-fit rounded-[40px] justify-between py-4 px-5 bg-ngekos-black">
                    <a href="{{ route('list-car') }}" class="flex flex-col items-center text-center gap-2">
                        <img src="{{ asset('assets/images/icons/cars-icon.svg') }}" class="w-8 h-8 flex shrink-0" alt="icon">
                        <span class="font-semibold text-sm text-white">Cars</span>
                    </a>
                    <a href="/booking/create" class="flex flex-col items-center text-center gap-2">
                        <img src="{{ asset('assets/images/icons/note-favorite.svg') }}" class="w-8 h-8 flex shrink-0" alt="icon">
                        <span class="font-semibold text-sm text-white">Booking</span>
                    </a>
                    <a href="{{ route('my-bookings') }}" class="flex flex-col items-center text-center gap-2">
                        <img src="{{ asset('assets/images/icons/search-status.svg') }}" class="w-8 h-8 flex shrink-0" alt="icon">
                        <span class="font-semibold text-sm text-white">Mine</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="flex flex-col items-center text-center gap-2">
                        <img src="{{ asset('assets/images/icons/profile-2user.svg') }}" class="w-8 h-8 flex shrink-0" alt="icon">
                        <span class="font-semibold text-sm text-white">Profile</span>
                    </a>
                </div>
            </nav>
        </div>
