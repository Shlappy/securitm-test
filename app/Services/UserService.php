<?php declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class UserService
{
    /**
     * Возвращает список всех пользователей с пагинацией.
     *
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getUserList(array $data): LengthAwarePaginator
    {
        $name = data_get($data, 'name');
        $order = data_get($data, 'order');

        return User::query()
            ->when($name, fn (Builder $query) => $query->whereRaw("UPPER(name) LIKE ?", ['%' . mb_strtoupper($name) . '%']))
            ->when($order, fn (Builder $query) => $query->orderBy('name', $order))
            ->paginate(15);
    }
}