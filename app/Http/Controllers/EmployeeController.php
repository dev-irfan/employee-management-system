<?php 

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\EmployeeService;
use Illuminate\Http\RedirectResponse;
use Psy\VersionUpdater\Downloader\Factory;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(Request $request): Factory|View
    {
        $query = $request->input('search');
        $employeesQuery = $this->employeeService->getAllEmployees();

        if ($query) {
            $employeesQuery = $employeesQuery->where('name', 'like', '%' . $query . '%');
        }
    

        $employees = $employeesQuery->orderBy('employee_id', 'desc')->paginate(10);

        return view('employees.index', compact('employees', 'query'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(StoreEmployeeRequest $request): RedirectResponse
    {
        $this->employeeService->createEmployee($request->validated());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee): Factory|View
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(StoreEmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $this->employeeService->updateEmployee($employee, $request->validated());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $this->employeeService->deleteEmployee($employee);
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
