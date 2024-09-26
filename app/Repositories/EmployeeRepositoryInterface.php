<?php 

namespace App\Repositories;

use App\Models\Employee;

interface EmployeeRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data): Employee;
    public function update(Employee $employee, array $data): Employee;
    public function delete(Employee $employee): bool;
}
