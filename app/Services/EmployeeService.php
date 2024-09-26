<?php 

namespace App\Services;

use App\Repositories\EmployeeRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getAllEmployees()
    {
        return $this->employeeRepository->all();
    }

    public function getEmployee($id)
    {
        return $this->employeeRepository->find($id);
    }

    public function createEmployee(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image_path'] = $this->storeImage($data['image']);
        }
        return $this->employeeRepository->create($data);
    }

    public function updateEmployee($employee, array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            if ($employee->image) {
                Storage::delete($employee->image);
            }
            $data['image_path'] = $this->storeImage($data['image']);
        }

        return $this->employeeRepository->update($employee, $data);
    }

    public function deleteEmployee($employee)
    {
        return $this->employeeRepository->delete($employee);
    }

    protected function storeImage(UploadedFile $image): string
    {
        return $image->store('images/employees', 'public'); 
    }
}
