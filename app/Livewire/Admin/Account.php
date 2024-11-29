<?php namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use function App\Livewire\mb_strlen;

class Account extends Component
{
	public User $user;

	#[Validate('required', message: 'Электронный адрес обязателен')]
	#[Validate('email', message: 'Некорректный электронный адрес')]
	public string $email;

	#[Validate('min:6', message: 'Пароль должен быть не короче 6 символов')]
	public string $password;

	public function mount():void {
		$this->user = Auth::user();
		$this->email = $this->user->email;
		$this->password = '';
	}

	/**
	 * Обновление аккаунта
	 *
	 * @return void
	 */
	public function update():void {
		$this->validate();

		$data = ['email' => trim($this->email)];

		if (mb_strlen($this->password)) {
			$data['password'] = Hash::make($this->password);
			$this->password = '';
		}

		$this->user->update($data);
	}

	public function render() {
		return view('livewire.admin.account')
			->layout('livewire.admin.template')
			->title('Аккаунт');
	}
}
