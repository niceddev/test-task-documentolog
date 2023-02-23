select * from employees e
    left join employees e2 on e2.employeeid = e.chiefid
where e.salary > e2.salary;

select department, count(distinct name) from employees
group by department
having count(distinct name) < 3;