

select department, count(distinct name) from employees group by department having count(distinct name) < 3